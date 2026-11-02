<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeddingCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeddingCardApiController extends Controller
{
    /**
     * Lấy danh sách thiệp cưới công khai trong hệ thống (JSON).
     *
     * Hỗ trợ tìm kiếm, lọc theo mẫu giao diện, lọc theo trạng thái và phân trang.
     */
    public function index(Request $request): JsonResponse
    {
        $query = WeddingCard::query();

        // 1. Lọc theo trạng thái (mặc định chỉ lấy thiệp đang hoạt động 'active' cho API công khai)
        $status = $request->input('status', 'active');
        if ($status !== 'all') {
            $query->where('status', $status);
        }

        // 2. Tìm kiếm theo tên cô dâu, chú rể, định danh (slug), địa điểm
        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('bride_name', 'like', "%{$search}%")
                    ->orWhere('groom_name', 'like', "%{$search}%")
                    ->orWhere('identifyWedding', 'like', "%{$search}%")
                    ->orWhere('name_place_wedding', 'like', "%{$search}%")
                    ->orWhere('address_wedding', 'like', "%{$search}%");
            });
        }

        // 3. Lọc theo mẫu thiệp (template)
        if ($template = $request->input('template')) {
            $query->where('template', (string) $template);
        }

        // Sắp xếp: mặc định mới nhất trước
        $query->orderByDesc('id');

        // 4. Phân trang hoặc lấy tất cả
        $isFull = $request->boolean('full', false) || $request->boolean('nested', false);
        $isBrief = $request->boolean('brief', false) || $request->boolean('summary', false);
        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100)); // Giới hạn từ 1 đến 100

        $transform = function (WeddingCard $card) use ($isFull, $isBrief) {
            if ($isFull) {
                return $this->transformCardDetail($card);
            }
            if ($isBrief) {
                return $this->transformCardBrief($card);
            }
            return $this->transformCardAll($card);
        };

        if ($request->boolean('all', false) || $request->input('paginate') === 'false') {
            $cards = $query->take(100)->get();

            $data = $cards->map($transform);

            return response()->json([
                'success' => true,
                'message' => 'Lấy danh sách thiệp cưới thành công.',
                'total' => $cards->count(),
                'data' => $data,
            ]);
        }

        $paginator = $query->paginate($perPage);

        $items = collect($paginator->items())->map($transform);

        return response()->json([
            'success' => true,
            'message' => 'Lấy danh sách thiệp cưới thành công.',
            'data' => $items,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'has_more_pages' => $paginator->hasMorePages(),
            ],
        ]);
    }

    /**
     * Lấy thông tin chi tiết của một thiệp cưới theo ID hoặc slug (identifyWedding).
     */
    public function show(string|int $id): JsonResponse
    {
        $card = is_numeric($id)
            ? WeddingCard::find($id)
            : null;

        if (!$card) {
            $card = WeddingCard::where('identifyWedding', $id)->first();
        }

        if (!$card) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy thiệp cưới.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lấy chi tiết thiệp cưới thành công.',
            'data' => $this->transformCardDetail($card),
        ]);
    }

    /**
     * Dữ liệu đầy đủ toàn bộ các trường của thiệp cưới (dạng phẳng, tương ứng với form tạo / sửa).
     */
    protected function transformCardAll(WeddingCard $card): array
    {
        $album = [];
        if (!empty($card->album)) {
            $decoded = json_decode($card->album, true);
            if (is_array($decoded)) {
                $album = $decoded;
            }
        }

        return [
            // 1. Định danh & đường dẫn
            'id' => $card->id,
            'formatted_id' => $card->formatted_id,
            'identifyWedding' => $card->identifyWedding,
            'slug' => $card->identifyWedding,
            'invite_url' => route('wedding.invite', $card->identifyWedding),
            'template' => (string) $card->template,
            'template_name' => $card->template_name,
            'status' => $card->status,
            'customer_email' => $card->customer_email,

            // 2. Thông tin Cô Dâu & Chú Rể
            'couple_name' => $card->couple_name,
            'bride_name' => $card->bride_name,
            'groom_name' => $card->groom_name,
            'bride_birthday' => $card->bride_birthday?->format('Y-m-d'),
            'groom_birthday' => $card->groom_birthday?->format('Y-m-d'),
            'bride_phone' => $card->bride_phone,
            'groom_phone' => $card->groom_phone,
            'bride_avatar' => $card->bride_avatar,
            'groom_avatar' => $card->groom_avatar,
            'des_bride' => $card->des_bride,
            'des_groom' => $card->des_groom,

            // 3. Phụ mẫu hai họ & Thứ bậc
            'groom_father_name' => $card->groom_father_name,
            'groom_mother_name' => $card->groom_mother_name,
            'groom_rank' => $card->groom_rank,
            'bride_father_name' => $card->bride_father_name,
            'bride_mother_name' => $card->bride_mother_name,
            'bride_rank' => $card->bride_rank,

            // 4. Lễ thành hôn chính
            'wedding_date' => $card->wedding_date?->format('Y-m-d'),
            'wedding_date_formatted' => $card->wedding_date?->format('d/m/Y'),
            'wedding_time' => $card->wedding_time,
            'wedding_date_al' => $card->wedding_date_al,
            'wedding_message' => $card->wedding_message,
            'name_place_wedding' => $card->name_place_wedding,
            'address_wedding' => $card->address_wedding,
            'address_wedding_map' => $card->address_wedding_map,

            // 5. Tiệc mừng nhà trai
            'groom_eating_title' => $card->groom_eating_title,
            'groom_eating_date' => $card->groom_eating_date?->format('Y-m-d'),
            'time_groom' => $card->time_groom,
            'time_groom_al' => $card->time_groom_al,
            'address_groom' => $card->address_groom,
            'groom_map' => $card->groom_map,

            // 6. Tiệc mừng nhà gái
            'bride_eating_title' => $card->bride_eating_title,
            'bride_eating_date' => $card->bride_eating_date?->format('Y-m-d'),
            'time_bride' => $card->time_bride,
            'time_bride_al' => $card->time_bride_al,
            'address_bride' => $card->address_bride,
            'bride_map' => $card->bride_map,

            // 7. Hộp mừng cưới & Tài khoản ngân hàng
            'groom_qr' => $card->groom_qr,
            'groom_bank_name' => $card->groom_bank_name,
            'groom_bank_account' => $card->groom_bank_account,
            'groom_bank_owner' => $card->groom_bank_owner,
            'bride_qr' => $card->bride_qr,
            'bride_bank_name' => $card->bride_bank_name,
            'bride_bank_account' => $card->bride_bank_account,
            'bride_bank_owner' => $card->bride_bank_owner,

            // 8. Hình ảnh, Album & Nhạc nền
            'banner_preview' => $card->banner_preview,
            'banner_top' => $card->banner_top,
            'banner_love_story' => $card->banner_love_story,
            'banner_coundown' => $card->banner_coundown,
            'banner_thanks' => $card->banner_thanks,
            'music_url' => $card->music_url,
            'album' => $album,

            // 9. Câu chuyện, lời mời & cảm ơn
            'love_story' => $card->love_story,
            'message_invite' => $card->message_invite,
            'message_gift' => $card->message_gift,
            'message_thanks' => $card->message_thanks,
            'date_coundown' => $card->date_coundown,

            // 10. Timeline & Quy định trang phục (Dresscode)
            'dresscode_note' => $card->dresscode_note,
            'dresscode_colors' => $card->dresscode_colors_list,
            'wedding_timeline' => $card->timeline_list,

            // 11. Thời gian tạo & cập nhật
            'created_at' => $card->created_at?->toIso8601String(),
            'updated_at' => $card->updated_at?->toIso8601String(),
        ];
    }

    /**
     * Dữ liệu rút gọn của thiệp cưới (khi truyền ?brief=1 hoặc ?summary=1).
     */
    protected function transformCardBrief(WeddingCard $card): array
    {
        return [
            'id' => $card->id,
            'formatted_id' => $card->formatted_id,
            'identifyWedding' => $card->identifyWedding,
            'slug' => $card->identifyWedding,
            'invite_url' => route('wedding.invite', $card->identifyWedding),
            'template' => (string) $card->template,
            'template_name' => $card->template_name,
            'couple_name' => $card->couple_name,
            'bride_name' => $card->bride_name,
            'groom_name' => $card->groom_name,
            'wedding_date' => $card->wedding_date?->format('Y-m-d'),
            'wedding_date_formatted' => $card->wedding_date?->format('d/m/Y'),
            'wedding_time' => $card->wedding_time,
            'wedding_date_al' => $card->wedding_date_al,
            'wedding_message' => $card->wedding_message,
            'name_place_wedding' => $card->name_place_wedding,
            'address_wedding' => $card->address_wedding,
            'address_wedding_map' => $card->address_wedding_map,
            'banner_preview' => $card->banner_preview,
            'bride_avatar' => $card->bride_avatar,
            'groom_avatar' => $card->groom_avatar,
            'status' => $card->status,
            'created_at' => $card->created_at?->toIso8601String(),
        ];
    }

    /**
     * Dữ liệu đầy đủ của thiệp cưới (dùng cho chi tiết).
     */
    protected function transformCardDetail(WeddingCard $card): array
    {
        $album = [];
        if (!empty($card->album)) {
            $decoded = json_decode($card->album, true);
            if (is_array($decoded)) {
                $album = $decoded;
            }
        }

        return [
            'id' => $card->id,
            'formatted_id' => $card->formatted_id,
            'identifyWedding' => $card->identifyWedding,
            'slug' => $card->identifyWedding,
            'invite_url' => route('wedding.invite', $card->identifyWedding),
            'template' => (string) $card->template,
            'template_name' => $card->template_name,
            'couple_name' => $card->couple_name,
            'status' => $card->status,

            // Thông tin Cô Dâu
            'bride' => [
                'name' => $card->bride_name,
                'birthday' => $card->bride_birthday?->format('Y-m-d'),
                'phone' => $card->bride_phone,
                'avatar' => $card->bride_avatar,
                'description' => $card->des_bride,
                'father_name' => $card->bride_father_name,
                'mother_name' => $card->bride_mother_name,
                'rank' => $card->bride_rank,
                'bank' => [
                    'name' => $card->bride_bank_name,
                    'account' => $card->bride_bank_account,
                    'owner' => $card->bride_bank_owner,
                    'qr' => $card->bride_qr,
                ],
                'party' => [
                    'title' => $card->bride_eating_title,
                    'date' => $card->bride_eating_date?->format('Y-m-d'),
                    'time' => $card->time_bride,
                    'time_al' => $card->time_bride_al,
                    'address' => $card->address_bride,
                    'map' => $card->bride_map,
                ],
            ],

            // Thông tin Chú Rể
            'groom' => [
                'name' => $card->groom_name,
                'birthday' => $card->groom_birthday?->format('Y-m-d'),
                'phone' => $card->groom_phone,
                'avatar' => $card->groom_avatar,
                'description' => $card->des_groom,
                'father_name' => $card->groom_father_name,
                'mother_name' => $card->groom_mother_name,
                'rank' => $card->groom_rank,
                'bank' => [
                    'name' => $card->groom_bank_name,
                    'account' => $card->groom_bank_account,
                    'owner' => $card->groom_bank_owner,
                    'qr' => $card->groom_qr,
                ],
                'party' => [
                    'title' => $card->groom_eating_title,
                    'date' => $card->groom_eating_date?->format('Y-m-d'),
                    'time' => $card->time_groom,
                    'time_al' => $card->time_groom_al,
                    'address' => $card->address_groom,
                    'map' => $card->groom_map,
                ],
            ],

            // Lễ thành hôn chính
            'ceremony' => [
                'message' => $card->wedding_message,
                'date' => $card->wedding_date?->format('Y-m-d'),
                'date_formatted' => $card->wedding_date?->format('d/m/Y'),
                'date_al' => $card->wedding_date_al,
                'time' => $card->wedding_time,
                'name_place' => $card->name_place_wedding,
                'address' => $card->address_wedding,
                'map_url' => $card->address_wedding_map,
            ],

            // Hình ảnh & Nhạc nền
            'media' => [
                'banner_preview' => $card->banner_preview,
                'banner_top' => $card->banner_top,
                'banner_love_story' => $card->banner_love_story,
                'banner_countdown' => $card->banner_coundown,
                'banner_thanks' => $card->banner_thanks,
                'music_url' => $card->music_url,
                'album' => $album,
            ],

            // Nội dung & Thiết lập khác
            'content' => [
                'love_story' => $card->love_story,
                'message_invite' => $card->message_invite,
                'message_gift' => $card->message_gift,
                'message_thanks' => $card->message_thanks,
                'countdown_date' => $card->date_coundown,
                'timeline' => $card->timeline_list,
                'dresscode_note' => $card->dresscode_note,
                'dresscode_colors' => $card->dresscode_colors_list,
            ],

            'created_at' => $card->created_at?->toIso8601String(),
            'updated_at' => $card->updated_at?->toIso8601String(),
        ];
    }
}
