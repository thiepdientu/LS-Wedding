<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

class SettingController extends Controller
{
    /**
     * Hiển thị trang cấu hình hệ thống
     */
    public function index(): View
    {
        $settings = SystemSetting::getAll();

        $s3Config = [
            'bucket' => config('filesystems.disks.s3.bucket') ?: 'Chưa cấu hình',
            'region' => config('filesystems.disks.s3.region') ?: 'Chưa cấu hình',
            'configured' => !empty(config('filesystems.disks.s3.bucket')) && !empty(config('filesystems.disks.s3.key')),
        ];

        return view('admin.settings.index', compact('settings', 's3Config'));
    }

    /**
     * Cập nhật các cấu hình hệ thống
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // General
            'site_name' => 'required|string|max:100',
            'site_slogan' => 'nullable|string|max:255',
            'hotline' => 'nullable|string|max:30',
            'zalo_url' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string|max:255',
            'default_domain' => 'required|string|max:100',

            // Wedding Defaults
            'default_card_validity_months' => 'required|integer|min:1|max:120',
            'max_album_photos' => 'required|integer|min:1|max:200',
            'enable_guestbook_default' => 'nullable|in:0,1,on',
            'enable_banking_qr_default' => 'nullable|in:0,1,on',
        ], [
            'site_name.required' => 'Vui lòng nhập tên thương hiệu / website.',
            'default_domain.required' => 'Vui lòng nhập tên miền mặc định của thiệp.',
            'default_card_validity_months.required' => 'Vui lòng nhập thời hạn hiển thị mặc định.',
            'default_card_validity_months.min' => 'Thời hạn hiển thị tối thiểu là 1 tháng.',
            'max_album_photos.required' => 'Vui lòng nhập số ảnh tối đa trong album.',
            'max_album_photos.min' => 'Số lượng ảnh tối thiểu là 1.',
        ]);

        $settingsToSave = [
            'site_name' => ['value' => $validated['site_name'], 'group' => 'general'],
            'site_slogan' => ['value' => $validated['site_slogan'] ?? '', 'group' => 'general'],
            'hotline' => ['value' => $validated['hotline'] ?? '', 'group' => 'general'],
            'zalo_url' => ['value' => $validated['zalo_url'] ?? '', 'group' => 'general'],
            'facebook_url' => ['value' => $validated['facebook_url'] ?? '', 'group' => 'general'],
            'default_domain' => ['value' => $validated['default_domain'], 'group' => 'general'],

            'default_card_validity_months' => ['value' => (string) $validated['default_card_validity_months'], 'group' => 'wedding'],
            'max_album_photos' => ['value' => (string) $validated['max_album_photos'], 'group' => 'wedding'],
            'enable_guestbook_default' => [
                'value' => $request->has('enable_guestbook_default') && in_array($request->input('enable_guestbook_default'), ['1', 'on', true], true) ? '1' : '0',
                'group' => 'wedding',
            ],
            'enable_banking_qr_default' => [
                'value' => $request->has('enable_banking_qr_default') && in_array($request->input('enable_banking_qr_default'), ['1', 'on', true], true) ? '1' : '0',
                'group' => 'wedding',
            ],
        ];

        SystemSetting::setMany($settingsToSave);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Đã lưu cấu hình hệ thống thành công!');
    }

    /**
     * Kiểm tra kết nối AWS S3 realtime
     */
    public function testS3(): JsonResponse
    {
        try {
            $testFilename = 's3-healthcheck-' . time() . '.txt';
            Storage::disk('s3')->put($testFilename, 'LS-Wedding S3 Healthcheck at ' . now()->toIso8601String());
            Storage::disk('s3')->delete($testFilename);

            return response()->json([
                'success' => true,
                'message' => 'Kết nối AWS S3 thành công! Bucket sẵn sàng lưu trữ ảnh và media.',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi kết nối AWS S3: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Dọn dẹp toàn bộ bộ nhớ đệm hệ thống
     */
    public function clearCache(): JsonResponse
    {
        try {
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            SystemSetting::clearCache();

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa toàn bộ Cache, View và Route thành công!',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi xóa bộ nhớ đệm: ' . $e->getMessage(),
            ], 500);
        }
    }
}
