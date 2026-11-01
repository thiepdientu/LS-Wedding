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
        // Các trường mới cho template hiện đại (2026+)
        'groom_father_name',    // Bố chú rể
        'groom_mother_name',    // Mẹ chú rể
        'groom_rank',           // Thứ bậc chú rể (Trưởng nam, Thứ nam, Út nam...)
        'bride_father_name',    // Bố cô dâu
        'bride_mother_name',    // Mẹ cô dâu
        'bride_rank',           // Thứ bậc cô dâu (Trưởng nữ, Thứ nữ, Út nữ...)
        'dresscode_note',       // Lời dặn trang phục
        'dresscode_colors',     // Bảng màu trang phục (JSON)
        'wedding_timeline',     // Lịch trình ngày cưới (JSON)
        'wedding_date_al',      // Ngày âm lịch lễ thành hôn chính
        'groom_bank_name',      // Ngân hàng chú rể
        'groom_bank_account',   // Số tài khoản chú rể
        'groom_bank_owner',     // Chủ tài khoản chú rể
        'bride_bank_name',      // Ngân hàng cô dâu
        'bride_bank_account',   // Số tài khoản cô dâu
        'bride_bank_owner',     // Chủ tài khoản cô dâu
        'music_url',            // Nhạc nền tùy chỉnh
    ];

    protected $attributes = [
        'status' => 'active',
        'album' => '[]',
    ];

    protected $casts = [
        'wedding_date' => 'date',
        'groom_birthday' => 'date',
        'bride_birthday' => 'date',
        'groom_eating_date' => 'date',
        'bride_eating_date' => 'date',
        'dresscode_colors' => 'array',
        'wedding_timeline' => 'array',
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Danh sách lời chúc của thiệp cưới
     */
    public function wishes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WeddingWish::class, 'wedding_card_id');
    }

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
     * Ngày giờ thành hôn định dạng chuẩn: 10:00:00 12/10/2026
     */
    public function getFormattedWeddingDatetimeAttribute(): string
    {
        if (!$this->wedding_date) {
            return 'Chưa thiết lập';
        }

        $time = trim((string) $this->wedding_time);
        if (empty($time)) {
            $time = '00:00:00';
        } elseif (preg_match('/^\d{1,2}:\d{2}$/', $time)) {
            $time .= ':00';
        }

        return $time . ' ' . $this->wedding_date->format('d/m/Y');
    }

    public const TEMPLATES = [
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
        '22' => 'Minimal Đỏ Đậm',
        '23' => 'Minimal Nâu Đậm',
        '24' => 'Hoa Mộc Xanh Classic',
        '25' => 'Hoa Mộc Xanh New',
        '26' => 'Minimalism Xanh Olive',
        '27' => 'Song Hỷ Đỏ Truyền Thống',
        '28' => 'Song Hỷ Xanh Ngọc',
        '29' => 'Song Long Xanh Đậm',
        '30' => 'Tơ Duyên Xanh Sage',
        '31' => 'Tơ Duyên Hồng Phấn',
        '32' => 'Cẩm Thạch Vàng Classic',
        '33' => 'Cẩm Thạch Vàng New',
        '34' => 'Anh Đào Hồng Sakura',
        '35' => 'Anh Đào Hồng New',
    ];

    /**
     * Danh sách tất cả template khả dụng
     *
     * @return array<string, string>
     */
    public static function getTemplateOptions(): array
    {
        return self::TEMPLATES;
    }

    /**
     * Tên template hiển thị thân thiện
     */
    public function getTemplateNameAttribute(): string
    {
        return self::TEMPLATES[$this->template] ?? ('Mẫu ' . ($this->template ?: '01'));
    }

    /**
     * Danh sách lịch trình ngày cưới (kèm fallback mặc định nếu chưa nhập)
     */
    public function getTimelineListAttribute(): array
    {
        if (!empty($this->wedding_timeline) && is_array($this->wedding_timeline)) {
            return $this->wedding_timeline;
        }

        // Lịch trình ngày cưới mẫu mặc định
        return [
            ['time' => '07:30', 'title' => 'Lễ Rước Dâu', 'desc' => 'Nghi thức khởi hành và rước dâu về tư gia'],
            ['time' => '09:00', 'title' => 'Lễ Gia Tiên', 'desc' => 'Dâng hương và ra mắt hai bên gia đình'],
            ['time' => '11:00', 'title' => 'Đón Khách', 'desc' => 'Đón tiếp quan khách & chụp hình lưu niệm'],
            ['time' => '11:30', 'title' => 'Hôn Lễ Chính Thức', 'desc' => 'Nghi thức cắt bánh, rót rượu mừng'],
            ['time' => '12:00', 'title' => 'Khai Tiệc', 'desc' => 'Mời quý khách cùng nâng ly chung vui'],
        ];
    }

    /**
     * Danh sách mã màu trang phục (kèm fallback mặc định)
     */
    public function getDresscodeColorsListAttribute(): array
    {
        if (!empty($this->dresscode_colors) && is_array($this->dresscode_colors)) {
            return $this->dresscode_colors;
        }

        return [
            ['name' => 'Trắng Kem', 'hex' => '#F5F2EB'],
            ['name' => 'Hồng Pastel', 'hex' => '#F4C2D1'],
            ['name' => 'Be Champagne', 'hex' => '#E8D8C8'],
        ];
    }

    /**
     * Dữ liệu ma trận lịch tháng cưới tự động theo wedding_date
     */
    public function getCalendarMatrixAttribute(): array
    {
        $date = $this->wedding_date ? \Carbon\Carbon::parse($this->wedding_date) : \Carbon\Carbon::now();
        $startOfMonth = $date->copy()->startOfMonth();

        $month = $date->month;
        $year = $date->year;
        $activeDay = $date->day;
        $daysInMonth = $date->daysInMonth;
        $startDayOfWeek = $startOfMonth->dayOfWeek; // 0 = CN, 1 = T2, ..., 6 = T7

        return [
            'month' => $month,
            'year' => $year,
            'active_day' => $activeDay,
            'total_days' => $daysInMonth,
            'start_day_of_week' => $startDayOfWeek,
            'month_title' => "Tháng " . str_pad($month, 2, '0', STR_PAD_LEFT) . " / " . $year,
            'days' => range(1, $daysInMonth),
        ];
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
