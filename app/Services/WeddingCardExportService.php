<?php

namespace App\Services;

use App\Models\WeddingCard;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use ZipArchive;

class WeddingCardExportService
{
    /**
     * Xuất bản gói thiệp cưới độc lập (Standalone ZIP)
     *
     * @param  WeddingCard  $weddingCard
     * @return string Đường dẫn tuyệt đối tới file ZIP đã tạo
     *
     * @throws \RuntimeException
     */
    public function export(WeddingCard $weddingCard): string
    {
        $uniqueId = 'wedding_' . $weddingCard->id . '_' . Str::random(8);
        $tempBasePath = storage_path('app/temp-exports');
        $exportDir = $tempBasePath . DIRECTORY_SEPARATOR . $uniqueId;
        $zipFilePath = $tempBasePath . DIRECTORY_SEPARATOR . 'thiep-cuoi-' . ($weddingCard->identifyWedding ?: 'id-' . $weddingCard->id) . '-' . date('Ymd-His') . '.zip';

        if (!File::isDirectory($tempBasePath)) {
            File::makeDirectory($tempBasePath, 0755, true);
        }

        if (File::isDirectory($exportDir)) {
            File::deleteDirectory($exportDir);
        }
        File::makeDirectory($exportDir, 0755, true);

        try {
            // 1. Xác định Blade view tương ứng
            $viewName = $this->resolveViewName((string) $weddingCard->template);

            // 2. Lấy dữ liệu lời chúc để nhúng snapshot offline
            $wishes = [];
            try {
                if ($weddingCard->exists) {
                    $wishes = $weddingCard->wishes()
                        ->where('is_approved', true)
                        ->orderByDesc('id')
                        ->get()
                        ->map(function ($w) {
                            return [
                                'id' => $w->id,
                                'sender_name' => $w->sender_name,
                                'message' => $w->message,
                                'attendance_status' => $w->attendance_status,
                                'guest_count' => $w->guest_count,
                                'created_at' => $w->created_at ? $w->created_at->format('d/m/Y H:i') : '',
                            ];
                        })
                        ->toArray();
                }
            } catch (\Throwable $ex) {
                Log::info('[WeddingExport] Bỏ qua nạp lời chúc DB: ' . $ex->getMessage());
            }

            // 3. Render HTML từ Blade template
            $rawHtml = View::make($viewName, [
                'weddingCard' => $weddingCard,
            ])->render();

            // 4. Sao chép thư mục tài sản của template tương ứng (nếu có trong public)
            $this->copyTemplateAssets($viewName, $exportDir);

            // 5. Sao chép thư mục upload riêng của thiệp (public/weddings/{id})
            $weddingUploadsDir = public_path('weddings/' . $weddingCard->id);
            if (File::isDirectory($weddingUploadsDir)) {
                $targetWeddingUploads = $exportDir . DIRECTORY_SEPARATOR . 'weddings' . DIRECTORY_SEPARATOR . $weddingCard->id;
                File::copyDirectory($weddingUploadsDir, $targetWeddingUploads);
            }

            // 6. Sao chép thư viện xử lý lời chúc chung (js/wedding-wishes.js & js/standalone-wishes-bridge.js)
            $targetJsDir = $exportDir . DIRECTORY_SEPARATOR . 'js';
            if (!File::isDirectory($targetJsDir)) {
                File::makeDirectory($targetJsDir, 0755, true);
            }
            $jsFiles = ['wedding-wishes.js', 'standalone-wishes-bridge.js'];
            foreach ($jsFiles as $jsFile) {
                $srcJs = public_path('js/' . $jsFile);
                if (File::isFile($srcJs)) {
                    File::copy($srcJs, $targetJsDir . DIRECTORY_SEPARATOR . $jsFile);
                }
            }

            // 7. Quét HTML để sao chép tất cả các tài nguyên public cục bộ được tham chiếu
            $this->copyReferencedPublicAssets($rawHtml, $exportDir);

            // 8. Tải và nội bộ hóa các ảnh / âm thanh upload hoặc remote
            $processedHtml = $this->localizeMediaFiles($weddingCard, $rawHtml, $exportDir);

            // 9. Chuẩn hóa tất cả các đường dẫn nội bộ thành đường dẫn tương đối (Relative paths)
            $finalHtml = $this->relativizeHtmlUrls($processedHtml, $weddingCard, $wishes);

            // 10. Ghi file index.html
            File::put($exportDir . DIRECTORY_SEPARATOR . 'index.html', $finalHtml);

            // 11. Ghi file 404.html (tránh lỗi định tuyến trên GitHub Pages)
            File::put($exportDir . DIRECTORY_SEPARATOR . '404.html', $this->generate404Html());

            // 12. Ghi file .nojekyll (quan trọng cho GitHub Pages)
            File::put($exportDir . DIRECTORY_SEPARATOR . '.nojekyll', '');

            // 13. Lưu snapshot lời chúc vào file data/wishes.json
            $dataDir = $exportDir . DIRECTORY_SEPARATOR . 'data';
            if (!File::isDirectory($dataDir)) {
                File::makeDirectory($dataDir, 0755, true);
            }
            File::put(
                $dataDir . DIRECTORY_SEPARATOR . 'wishes.json',
                json_encode($wishes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
            );

            // 14. Tạo file README.md hướng dẫn chi tiết
            File::put(
                $exportDir . DIRECTORY_SEPARATOR . 'README.md',
                $this->generateReadme($weddingCard)
            );

            // 15. Nén toàn bộ thư mục thành file ZIP
            $this->createZipArchive($exportDir, $zipFilePath);

            // 16. Dọn dẹp thư mục tạm
            File::deleteDirectory($exportDir);

            return $zipFilePath;
        } catch (\Throwable $e) {
            if (File::isDirectory($exportDir)) {
                File::deleteDirectory($exportDir);
            }
            if (File::isFile($zipFilePath)) {
                @unlink($zipFilePath);
            }
            throw $e;
        }
    }

    /**
     * Xác định tên Blade template theo mã
     */
    public function resolveViewName(string|null $templateCode): string
    {
        $code = (string) ($templateCode ?: '1');

        return match ($code) {
            '1' => 'template01',
            '1n' => 'template01new',
            '2' => 'template02',
            '3' => 'template04',
            '4' => 'template05',
            '5' => 'template06',
            '6' => 'template07',
            '7' => 'template18',
            '8' => 'template08',
            '9' => 'template09',
            '10' => 'template10',
            '11' => 'template11',
            '12' => 'template9n',
            '13' => 'template13',
            '14' => 'template14',
            '15' => 'template15',
            '16' => 'template16',
            '17' => 'template17',
            '18' => 'template18',
            '19' => 'template19',
            '20' => 'template20',
            '21' => 'template21',
            default => View::exists("template{$code}") ? "template{$code}" : 'template01',
        };
    }

    /**
     * Sao chép tài nguyên thư mục của template tương ứng
     */
    protected function copyTemplateAssets(string $viewName, string $exportDir): void
    {
        $candidateDirs = [
            $viewName,
            str_replace('template0', 'template', $viewName),
            'template01/media', // Thư viện nhạc mặc định dùng chung nhiều template
        ];

        foreach ($candidateDirs as $dirName) {
            $sourcePath = public_path($dirName);
            if (File::isDirectory($sourcePath)) {
                $targetPath = $exportDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $dirName);
                if (!File::isDirectory($targetPath)) {
                    File::copyDirectory($sourcePath, $targetPath);
                }
            }
        }
    }

    /**
     * Quét các thẻ link, script, img, source trong HTML để sao chép các file public tương ứng
     */
    protected function copyReferencedPublicAssets(string $html, string $exportDir): void
    {
        $pattern = '/(?:href|src|url\()\s*[\'"]?(?:https?:\/\/[^\/"\'\s]+)?\/([a-zA-Z0-9_\-\.\/]+?\.(?:css|js|png|jpe?g|webp|gif|svg|mp3|wav|ogg|woff2?|ttf|eot|ico))[\'"]?/i';

        if (preg_match_all($pattern, $html, $matches)) {
            $matchedPaths = array_unique($matches[1]);
            foreach ($matchedPaths as $relPath) {
                $cleanRel = ltrim(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $relPath), DIRECTORY_SEPARATOR);
                $fullSourcePath = public_path($cleanRel);

                if (File::isFile($fullSourcePath)) {
                    $targetPath = $exportDir . DIRECTORY_SEPARATOR . $cleanRel;
                    $targetDir = dirname($targetPath);

                    if (!File::isDirectory($targetDir)) {
                        File::makeDirectory($targetDir, 0755, true);
                    }

                    if (!File::exists($targetPath)) {
                        @File::copy($fullSourcePath, $targetPath);
                    }
                }
            }
        }
    }

    /**
     * Tải và nội bộ hóa toàn bộ ảnh / âm thanh (từ dữ liệu thiệp và quét trong mã HTML) để chạy 100% offline
     */
    protected function localizeMediaFiles(WeddingCard $weddingCard, string $html, string $exportDir): string
    {
        $mediaStorageDir = $exportDir . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'media';
        if (!File::isDirectory($mediaStorageDir)) {
            File::makeDirectory($mediaStorageDir, 0755, true);
        }

        $mediaList = [];

        // 1. Thu thập từ thuộc tính của model WeddingCard
        $mediaAttributes = [
            'banner_preview',
            'banner_top',
            'banner_love_story',
            'banner_coundown',
            'banner_thanks',
            'bride_avatar',
            'groom_avatar',
            'groom_qr',
            'bride_qr',
            'music_url',
        ];

        foreach ($mediaAttributes as $attr) {
            $val = trim((string) $weddingCard->{$attr});
            if (!empty($val)) {
                $cleanVal = str_replace('\/', '/', $val);
                $cleanVal = stripslashes($cleanVal);
                $mediaList[] = $cleanVal;
            }
        }

        // Album ảnh cưới
        if (!empty($weddingCard->album)) {
            $album = is_array($weddingCard->album) ? $weddingCard->album : json_decode($weddingCard->album, true);
            if (is_array($album)) {
                foreach ($album as $item) {
                    if (is_string($item) && !empty(trim($item))) {
                        $cleanItem = str_replace('\/', '/', trim($item));
                        $cleanItem = stripslashes($cleanItem);
                        $mediaList[] = $cleanItem;
                    }
                }
            }
        }

        // 2. Quét toàn bộ HTML để tìm TẤT CẢ URL hình ảnh và âm thanh
        // Bao gồm cả định dạng chuẩn và định dạng bị escape trong JSON (https:\/\/...)
        $htmlMediaPatterns = [
            // Thẻ img src
            '/<img\b[^>]*?\bsrc=["\']([^"\']+)["\']/i',
            // CSS background-image url()
            '/url\([\'"]?((?:https?:)?\/\/[^\'")\s]+?\.(?:png|jpe?g|webp|gif|svg|avif|mp3|wav|ogg)(?:\?[^\'")\s]*)?)[\'"]?\)/i',
            // Thẻ audio / source src
            '/<(?:audio|source)\b[^>]*?\bsrc=["\']([^"\']+)["\']/i',
            // URL trong thẻ meta og:image, twitter:image
            '/<meta\b[^>]*?\bcontent=["\']((?:https?:)?\/\/[^"\']+\.(?:png|jpe?g|webp|gif|svg|avif)(?:\?[^"\']*)?)["\']/i',
            // Mọi chuỗi URL ảnh hoặc audio (cả dạng JSON escaped https:\\/\\/...)
            '/(https?:\\\\\/\\\\\/[^\s"\'<>\(\)]+?\.(?:png|jpe?g|webp|gif|svg|avif|mp3|wav|ogg)(?:[^\s"\'<>\(\)]*)?)/i',
            '/(https?:\/\/[^\s"\'<>\(\)]+?\.(?:png|jpe?g|webp|gif|svg|avif|mp3|wav|ogg)(?:\?[^\s"\'<>\(\)]*)?)/i',
        ];

        foreach ($htmlMediaPatterns as $pattern) {
            if (preg_match_all($pattern, $html, $matches)) {
                foreach ($matches[1] as $matchedUrl) {
                    $cleanUrl = trim($matchedUrl);
                    if (empty($cleanUrl) || str_starts_with($cleanUrl, 'data:')) {
                        continue;
                    }
                    // Chuẩn hóa loại bỏ escape \/ thành /
                    $normalizedUrl = str_replace('\/', '/', $cleanUrl);
                    $normalizedUrl = stripslashes($normalizedUrl);
                    $normalizedUrl = trim($normalizedUrl, " \t\n\r\0\x0B\"'\\");
                    if (!empty($normalizedUrl)) {
                        $mediaList[] = $normalizedUrl;
                    }
                }
            }
        }

        $mediaList = array_unique($mediaList);

        // Bảng ánh xạ các chuỗi cần thay thế trong HTML
        $replacements = [];

        $registerReplacement = function (string $sourceUrl, string $targetPath) use (&$replacements) {
            if (empty($sourceUrl) || empty($targetPath)) {
                return;
            }

            // 1. Đường dẫn nguyên bản
            $replacements[$sourceUrl] = $targetPath;

            // 2. Không kèm query string (nếu có ?)
            $noQuery = strtok($sourceUrl, '?');
            if ($noQuery && $noQuery !== $sourceUrl) {
                $replacements[$noQuery] = $targetPath;
            }

            // 3. Dạng JSON-escaped (\/) - Rất quan trọng cho các biến JS như dbGallery, albumPhotosJson
            $jsonSource = str_replace('/', '\/', $sourceUrl);
            $jsonRelTarget = str_replace('/', '\/', $targetPath);
            $replacements[$jsonSource] = $jsonRelTarget;
            $replacements[$jsonSource] = $targetPath;

            if ($noQuery && $noQuery !== $sourceUrl) {
                $replacements[str_replace('/', '\/', $noQuery)] = $jsonRelTarget;
                $replacements[str_replace('/', '\/', $noQuery)] = $targetPath;
            }

            // 4. Dạng HTML Entities
            $replacements[htmlspecialchars($sourceUrl, ENT_QUOTES)] = $targetPath;
            $replacements[htmlspecialchars($jsonSource, ENT_QUOTES)] = $jsonRelTarget;
        };

        foreach ($mediaList as $mediaUrl) {
            // A. Kiểm tra nếu là file cục bộ trong hệ thống
            $localCandidate = $this->resolveLocalFilePath($mediaUrl);
            if ($localCandidate && File::isFile($localCandidate)) {
                $cleanName = basename($localCandidate);
                $destFile = $mediaStorageDir . DIRECTORY_SEPARATOR . $cleanName;
                $relTarget = './storage/media/' . $cleanName;

                if (!File::exists($destFile)) {
                    @File::copy($localCandidate, $destFile);
                }

                $registerReplacement($mediaUrl, $relTarget);
                $registerReplacement(asset($mediaUrl), $relTarget);
                $registerReplacement(url($mediaUrl), $relTarget);
                $registerReplacement('/' . ltrim($mediaUrl, '/'), $relTarget);
                continue;
            }

            // B. Nếu là URL remote (http:// hoặc https://)
            if (str_starts_with($mediaUrl, 'http://') || str_starts_with($mediaUrl, 'https://')) {
                // Bỏ qua nếu là Google Fonts API
                if (str_contains($mediaUrl, 'fonts.googleapis.com') || str_contains($mediaUrl, 'fonts.gstatic.com')) {
                    continue;
                }

                try {
                    $urlWithoutQuery = strtok($mediaUrl, '?') ?: $mediaUrl;
                    $ext = strtolower(pathinfo(parse_url($urlWithoutQuery, PHP_URL_PATH) ?? '', PATHINFO_EXTENSION));
                    if (empty($ext) || strlen($ext) > 5) {
                        $ext = 'jpg';
                    }

                    $safeFileName = 'img_' . substr(md5($urlWithoutQuery), 0, 16) . '.' . $ext;
                    $destFile = $mediaStorageDir . DIRECTORY_SEPARATOR . $safeFileName;
                    $relTarget = './storage/media/' . $safeFileName;

                    if (!File::exists($destFile)) {
                        // Tải về với giả lập trình duyệt và tắt verify SSL tránh lỗi chứng chỉ trên Windows
                        $response = Http::withoutVerifying()
                            ->withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                                'Accept' => 'image/avif,image/webp,image/apng,image/svg+xml,image/*,audio/*,*/*;q=0.8',
                            ])
                            ->timeout(12)
                            ->get($mediaUrl);

                        if ($response->successful() && strlen($response->body()) > 0) {
                            File::put($destFile, $response->body());
                            $registerReplacement($mediaUrl, $relTarget);
                        }
                    } else {
                        $registerReplacement($mediaUrl, $relTarget);
                    }
                } catch (\Throwable $ex) {
                    Log::info("[WeddingExport] Không thể tải remote file {$mediaUrl}: " . $ex->getMessage());
                }
            }
        }

        // Thực hiện thay thế tất cả các URL đã thu thập và tải về
        if (!empty($replacements)) {
            // Sắp xếp các khóa dài hơn lên trước để tránh thay thế một phần (partial replace)
            uksort($replacements, fn($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($replacements), array_values($replacements), $html);
        }

        return $html;
    }

    /**
     * Tìm file vật lý trên ổ đĩa từ chuỗi đường dẫn
     */
    protected function resolveLocalFilePath(string $path): ?string
    {
        $clean = ltrim(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, parse_url($path, PHP_URL_PATH) ?? $path), DIRECTORY_SEPARATOR);

        // 1. Trong thư mục public/
        $inPublic = public_path($clean);
        if (File::isFile($inPublic)) {
            return $inPublic;
        }

        // 2. Bắt đầu bằng storage/ -> storage/app/public/
        if (str_starts_with($clean, 'storage' . DIRECTORY_SEPARATOR)) {
            $inStorage = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . substr($clean, 8));
            if (File::isFile($inStorage)) {
                return $inStorage;
            }
        }

        // 3. Trực tiếp trong storage/app/public/
        $directInStorage = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $clean);
        if (File::isFile($directInStorage)) {
            return $directInStorage;
        }

        return null;
    }

    /**
     * Chuyển đổi toàn bộ đường dẫn tuyệt đối sang đường dẫn tương đối (Relative Path)
     */
    protected function relativizeHtmlUrls(string $html, WeddingCard $weddingCard, array $wishes): string
    {
        // 1. Xóa tất cả các tiền tố domain của ứng dụng (http://localhost:8000/, https://ls-wedding.laravel.cloud/...)
        $domains = array_unique(array_filter([
            parse_url(url('/'), PHP_URL_HOST),
            parse_url(config('app.url'), PHP_URL_HOST),
            'ls-wedding.laravel.cloud',
            request()->getHost(),
            'localhost',
            '127.0.0.1',
        ]));

        foreach ($domains as $domain) {
            if (!empty($domain)) {
                $html = preg_replace('#https?://' . preg_quote($domain, '#') . '(?::\d+)?/#i', './', $html);
            }
        }

        // 2. Chuyển các đường dẫn root-relative (/template..., /js..., /storage..., /weddings...) thành relative (./...)
        $directoriesPattern = 'template\w+|templates|js|storage|weddings|image|images|css|fonts|media';
        
        // Thuộc tính href, src, action, content
        $html = preg_replace(
            '#(\b(?:href|src|action|content)=["\'])\/(' . $directoriesPattern . ')\/#i',
            '$1./$2/',
            $html
        );

        // Thuộc tính url(...) trong CSS
        $html = preg_replace(
            '#(url\([\'"]?)\/(' . $directoriesPattern . ')\/#i',
            '$1./$2/',
            $html
        );

        // 3. Tiêm cấu hình API Live và dữ liệu lời chúc ban đầu vào thẻ <head>
        $apiLiveBaseUrl = rtrim(config('app.url') ?: url('/'), '/');
        $wishesJson = json_encode($wishes, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

        $injectionScript = <<<HTML
    <!-- Cấu hình Chạy Độc Lập & Đồng bộ GitHub Pages - LS-Wedding -->
    <script>
        window.WEDDING_CARD_ID = "{$weddingCard->id}";
        window.WEDDING_IDENTIFY = "{$weddingCard->identifyWedding}";
        window.WEDDING_API_URL = "{$apiLiveBaseUrl}";
        window.INITIAL_WISHES = {$wishesJson};
    </script>
HTML;

        if (stripos($html, '</head>') !== false) {
            $html = str_ireplace('</head>', $injectionScript . "\n</head>", $html);
        } else {
            $html = $injectionScript . "\n" . $html;
        }

        // 4. Tiêm script Live Wishes Bridge vào cuối thẻ <body> để tự động nạp lời chúc online
        $bridgeScriptTag = '<script src="./js/standalone-wishes-bridge.js"></script>';
        if (stripos($html, '</body>') !== false) {
            $html = str_ireplace('</body>', $bridgeScriptTag . "\n</body>", $html);
        } else {
            $html .= "\n" . $bridgeScriptTag;
        }

        return $html;
    }

    /**
     * Tạo file 404.html chuyển hướng tự động về trang chủ thiệp cưới trên GitHub Pages
     */
    protected function generate404Html(): string
    {
        return <<<'HTML'
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0; url=./">
    <title>Đang chuyển hướng về Thiệp Cưới...</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8fafc;
            color: #334155;
            text-align: center;
            padding: 20px;
        }
        .box {
            background: #ffffff;
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            max-width: 420px;
        }
        h2 { margin: 0 0 12px; font-size: 20px; }
        p { margin: 0 0 20px; font-size: 14px; color: #64748b; }
        a {
            display: inline-block;
            background: #4f46e5;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Đang mở thiệp cưới...</h2>
        <p>Hệ thống đang tự động chuyển hướng. Nếu trang không tự tải, bạn vui lòng bấm nút bên dưới.</p>
        <a href="./">Mở Thiệp Cưới</a>
    </div>
</body>
</html>
HTML;
    }

    /**
     * Tạo tài liệu hướng dẫn README.md chi tiết bằng tiếng Việt
     */
    protected function generateReadme(WeddingCard $weddingCard): string
    {
        $coupleName = $weddingCard->couple_name ?: 'Thiệp Cưới Online';
        $weddingDate = $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d/m/Y') : 'Chưa thiết lập';
        $timeStr = $weddingCard->wedding_time ?: '';
        $slug = $weddingCard->identifyWedding ?: 'wedding-' . $weddingCard->id;

        return <<<MARKDOWN
# 💍 Thiệp Cưới Online: {$coupleName}

> **Ngày thành hôn:** {$timeStr} {$weddingDate}  
> **Gói xuất bản:** Tự động tạo bởi Hệ thống Quản trị Thiệp Cưới Online (LS-Wedding).

Gói mã nguồn này đã được tối ưu hóa toàn bộ thành **Static Site (HTML/CSS/JS thuần)**, không phụ thuộc vào bất kỳ máy chủ PHP hay cơ sở dữ liệu MySQL nào. Bạn có thể mở offline trên máy tính hoặc tải lên GitHub Pages miễn phí hoàn toàn.

---

## 🚀 HƯỚNG DẪN SỬ DỤNG

### CÁCH 1: Xem trực tiếp Offline trên máy tính cá nhân
1. Giải nén file `.zip` vào một thư mục bất kỳ.
2. Click đúp vào file **`index.html`** để mở trên bất kỳ trình duyệt nào (Google Chrome, Microsoft Edge, Safari, Firefox).
3. *(Tùy chọn)* Nếu bạn dùng VS Code, bạn có thể click chuột phải vào `index.html` và chọn **Open with Live Server**.

---

### CÁCH 2: Xuất bản lên GitHub Pages (Miễn phí vĩnh viễn)

Chỉ với 3 bước đơn giản dưới đây, bạn sẽ có ngay một trang web thiệp cưới online dạng `https://<ten-github>.github.io/<ten-repo>/`:

#### Bước 1: Tạo Repository trên GitHub
1. Đăng nhập vào tài khoản [GitHub](https://github.com/).
2. Nhấn vào nút **New** (Tạo mới Repository) hoặc truy cập [github.com/new](https://github.com/new).
3. Đặt **Repository name** (ví dụ: `{$slug}` hoặc `dam-cuoi`).
4. Chọn chế độ **Public**.
5. Nhấn nút **Create repository**.

#### Bước 2: Tải toàn bộ mã nguồn lên GitHub
- **Cách giao diện web (Đơn giản nhất):**
  1. Trong trang repository vừa tạo, nhấn vào liên kết **uploading an existing file**.
  2. Kéo thả **tất cả các file và thư mục** trong gói giải nén này (bao gồm file `index.html`, `404.html`, `.nojekyll`, thư mục `template...`, `js`, `storage`, v.v.) vào trình duyệt.
  3. Chờ các file tải lên hoàn tất, sau đó nhấn nút xanh **Commit changes**.
- **Cách dùng lệnh Git (Dành cho lập trình viên):**
  ```bash
  git init
  git add .
  git commit -m "Phát hành thiệp cưới {$coupleName}"
  git branch -M main
  git remote add origin https://github.com/<tai-khoan-cua-ban>/{$slug}.git
  git push -u origin main
  ```

#### Bước 3: Kích hoạt GitHub Pages
1. Tại repository của bạn trên GitHub, nhấn vào tab **Settings** (Cài đặt).
2. Ở thanh menu bên trái, tìm và nhấn vào mục **Pages** (mục con của Code and automation).
3. Tại phần **Build and deployment**:
   - **Source**: Chọn `Deploy from a branch`.
   - **Branch**: Chọn nhánh `main` (hoặc `master`), thư mục chọn `/(root)`.
   - Nhấn nút **Save**.
4. Chờ khoảng 1 - 2 phút, GitHub Pages sẽ cấp cho bạn một đường dẫn công khai:
   👉 `https://<tai-khoan-cua-ban>.github.io/{$slug}/`

---

### CÁCH 3: Cài đặt Tên Miền Riêng (Custom Domain - ví dụ: `tuan-linh.wedding`)
Nếu bạn đã mua tên miền riêng và muốn gán vào GitHub Pages:
1. Trong trang quản lý DNS của tên miền (Cloudflare, Nhà đăng ký tên miền...), thêm 4 bản ghi `A` trỏ về IP của GitHub:
   - `185.199.108.153`
   - `185.199.109.153`
   - `185.199.110.153`
   - `185.199.111.153`
2. Thêm 1 bản ghi `CNAME` cho `www` trỏ về `<tai-khoan-cua-ban>.github.io`.
3. Vào lại mục **Settings -> Pages** trên GitHub, nhập tên miền vào ô **Custom domain** rồi nhấn **Save**.
4. Tích chọn **Enforce HTTPS** để kích hoạt chứng chỉ bảo mật SSL miễn phí.

---

## 💌 VỀ TÍNH NĂNG LỜI CHÚC & XÁC NHẬN THAM DỰ (RSVP)
- **Khi xem offline:** Danh sách lời chúc đã được lưu sẵn dạng bản chụp (snapshot) trong file `data/wishes.json` và nhúng sẵn vào trang.
- **Khi chạy trên GitHub Pages:** Nếu thiết bị có kết nối Internet, mọi lời chúc hoặc xác nhận tham dự (RSVP) của khách mời sẽ tự động đồng bộ về hệ thống quản trị trung tâm để cô dâu & chú rể tiện theo dõi!

---
*Chúc hai bạn trăm năm hạnh phúc! ❤️*
MARKDOWN;
    }

    /**
     * Nén toàn bộ thư mục thành file ZIP chuẩn
     */
    protected function createZipArchive(string $sourceDir, string $zipFilePath): bool
    {
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException("Không thể tạo file nén ZIP tại: {$zipFilePath}");
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($sourceDir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        $sourceRealPath = realpath($sourceDir);

        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($sourceRealPath) + 1);
                // Đảm bảo định dạng dấu gạch chéo chuẩn trong ZIP
                $normalizedRelative = str_replace('\\', '/', $relativePath);
                $zip->addFile($filePath, $normalizedRelative);
            }
        }

        return $zip->close();
    }
}
