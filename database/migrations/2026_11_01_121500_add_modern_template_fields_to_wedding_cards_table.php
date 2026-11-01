<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('wedding_cards', function (Blueprint $table) {
            // 1. Phụ Mẫu & Thứ bậc hai họ
            $table->string('groom_father_name', 100)->nullable()->after('groom_birthday');
            $table->string('groom_mother_name', 100)->nullable()->after('groom_father_name');
            $table->string('groom_rank', 50)->nullable()->after('groom_mother_name'); // Trưởng nam, Thứ nam, Út nam...

            $table->string('bride_father_name', 100)->nullable()->after('bride_birthday');
            $table->string('bride_mother_name', 100)->nullable()->after('bride_father_name');
            $table->string('bride_rank', 50)->nullable()->after('bride_mother_name'); // Trưởng nữ, Thứ nữ, Út nữ...

            // 2. Trang phục (Dress Code)
            $table->text('dresscode_note')->nullable()->after('wedding_message');
            $table->json('dresscode_colors')->nullable()->after('dresscode_note'); // Mảng mã màu: [{"name": "Hồng Pastel", "hex": "#F4C2D1"}, ...]

            // 3. Lịch trình sự kiện ngày cưới (Timeline) & Ngày âm lịch chính
            $table->json('wedding_timeline')->nullable()->after('wedding_time'); // [{"time": "09:00", "title": "Lễ Gia Tiên"}, ...]
            $table->string('wedding_date_al', 100)->nullable()->after('wedding_date'); // Ngày âm lịch lễ thành hôn chính

            // 4. Chi tiết Ngân hàng (Hộp mừng cưới có nút Copy STK)
            $table->string('groom_bank_name', 100)->nullable()->after('groom_qr');
            $table->string('groom_bank_account', 50)->nullable()->after('groom_bank_name');
            $table->string('groom_bank_owner', 100)->nullable()->after('groom_bank_account');

            $table->string('bride_bank_name', 100)->nullable()->after('bride_qr');
            $table->string('bride_bank_account', 50)->nullable()->after('bride_bank_name');
            $table->string('bride_bank_owner', 100)->nullable()->after('bride_bank_account');

            // 5. Nhạc nền cưới tùy chỉnh
            $table->string('music_url', 500)->nullable()->after('banner_preview');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wedding_cards', function (Blueprint $table) {
            $table->dropColumn([
                'groom_father_name',
                'groom_mother_name',
                'groom_rank',
                'bride_father_name',
                'bride_mother_name',
                'bride_rank',
                'dresscode_note',
                'dresscode_colors',
                'wedding_timeline',
                'wedding_date_al',
                'groom_bank_name',
                'groom_bank_account',
                'groom_bank_owner',
                'bride_bank_name',
                'bride_bank_account',
                'bride_bank_owner',
                'music_url',
            ]);
        });
    }
};
