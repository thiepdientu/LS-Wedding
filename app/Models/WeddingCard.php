<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingCard extends Model
{
    //
    protected $fillable = [
        'identifyWedding',  // Định danh thiệp / slug
        'status',           // active, locked, draft
        'customer_email',   // Email khách hàng
        'expires_at',       // Ngày hết hạn
        'banner_preview',   // banner preview
        'template',         // mẫu thiệp
        'bride_name',           // Tên cô dâu
        'groom_name',           // Tên chú rể
        'des_bride',
        'des_groom',
        'banner_love_story',
        'love_story',
        'banner_top',           // Banner ảnh top
        'wedding_time',
        'wedding_message', 
        'name_place_wedding',   
        'wedding_date',         // Ngày tổ chức lễ thành hôn
        'address_wedding',      // Địa chỉ tổ chức lễ thành hôn
        'address_wedding_map',  // Bản đồ địa chỉ tổ chức lễ thành hôn
        'bride_birthday',       // Ngày sinh cô dâu
        'groom_birthday',         // Ngày sinh chú rể
        'groom_eating_title',
        'bride_eating_title',
        'groom_eating_date',
         'bride_eating_date',
         'message_invite',
         'message_gift',
         'message_thanks',
         'banner_thanks',
        'bride_avatar',         // Ảnh đại diện cô dâu
        'groom_avatar',         // Ảnh đại diện chú rể
        'banner_coundown',      // Banner đếm ngược
        'album',                // Album ảnh (lưu dạng JSON)
        'date_coundown',        // Ngày đếm ngược
        'address_groom',        // Địa chỉ chú rể
        'address_bride',        // Địa chỉ cô dâu
        'time_groom',           // Thời gian mời cỗ chú rể (Dương lịch)
        'time_groom_al',        // Thời gian mời cỗ chú rể (Âm lịch)
        'time_bride',           // Thời gian mời cỗ cô dâu (Dương lịch)
        'time_bride_al',        // Thời gian mời cỗ cô dâu (Âm lịch)
        'bride_phone',          // Số điện thoại cô dâu
        'groom_phone',          // Số điện thoại chú rể
        'groom_qr',             // Mã QR chú rể
        'bride_qr',             // Mã QR cô dâu
        'groom_map',            // Bản đồ nhà chú rể
        'bride_map',            // Bản đồ nhà cô dâu
    ];

    protected $casts = [
        'wedding_date' => 'date',
        'groom_birthday' => 'date',
        'bride_birthday' => 'date',
        'groom_eating_date' => 'date',
        'bride_eating_date' => 'date',
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Mã hiển thị chuẩn dạng #TC-1042
     */
    public function getFormattedIdAttribute(): string
    {
        return '#TC-' . (1000 + $this->id);
    }

    /**
     * Tên cặp đôi: Chú rể & Cô dâu
     */
    public function getCoupleNameAttribute(): string
    {
        return trim(($this->groom_name ?: 'Chú rể') . ' & ' . ($this->bride_name ?: 'Cô dâu'));
    }

    /**
     * Tên template hiển thị thân thiện
     */
    public function getTemplateNameAttribute(): string
    {
        $templates = [
            '1' => 'Hiện đại 01 (Minimal)',
            '1n' => 'Hiện đại 01 New',
            '2' => 'Cổ điển 02 (Vintage)',
            '3' => 'Hiện đại 03 (Floral)',
            '4' => 'Thanh lịch 04 (Pastel)',
            '5' => 'Sang trọng 05 (Royal)',
            '6' => 'Tự nhiên 06 (Botanical)',
            '7' => 'Nghệ thuật 07 (Artistic)',
            '8' => 'Truyền thống 08 (Heritage)',
            '9' => 'Tối giản 09 (Nordic)',
            '10' => 'Lãng mạn 10 (Sweet Pink)',
            '11' => 'Cổ điển 11 (Elegance)',
            '12' => 'Hiện đại 12 (Trendy)',
            '13' => 'Sang trọng 13 (Glamour)',
            '14' => 'Thơ mộng 14 (Dreamy)',
            '15' => 'Nhiệt đới 15 (Tropical)',
            '16' => 'Tinh tế 16 (Subtle)',
            '17' => 'Hoàng gia 17 (Imperial)',
            '18' => 'Mộc mạc 18 (Rustic)',
            '19' => 'Quý phái 19 (Noble)',
            '20' => 'Đương đại 20 (Contemporary)',
            '21' => 'Đơn giản 21 (Simple)',
        ];

        return $templates[$this->template] ?? ('Mẫu ' . ($this->template ?: '01'));
    }

    /**
     * Cấu hình nhãn và style hiển thị trạng thái
     */
    public function getStatusInfoAttribute(): array
    {
        return match ($this->status) {
            'locked' => [
                'label' => 'Đã ẩn (Khóa)',
                'badge_class' => 'bg-rose-50 text-rose-700 ring-1 ring-rose-200',
                'dot_class' => 'bg-rose-500',
            ],
            'draft' => [
                'label' => 'Bản Nháp',
                'badge_class' => 'bg-slate-100 text-slate-700 ring-1 ring-slate-200',
                'dot_class' => 'bg-slate-400',
            ],
            default => [
                'label' => 'Đang hoạt động',
                'badge_class' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200',
                'dot_class' => 'bg-emerald-500',
            ],
        };
    }
}
