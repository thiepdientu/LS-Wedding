<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSettingTest extends TestCase
{
    public function test_admin_settings_index_renders_successfully(): void
    {
        $response = $this->get(route('admin.settings.index'));

        $response->assertStatus(200);
        $response->assertSee('Cài đặt hệ thống');
        $response->assertSee('Thông tin chung & Hỗ trợ', false);
        $response->assertSee('Quy chuẩn Thiệp cưới');
        $response->assertSee('Tiện ích & Cloud S3', false);
        $response->assertSee('Kiểm tra kết nối AWS S3');
        $response->assertSee('Dọn dẹp toàn bộ Cache');
    }

    public function test_admin_settings_update_saves_values_and_redirects(): void
    {
        $payload = [
            'site_name' => 'LS Wedding Pro',
            'site_slogan' => 'Nền tảng thiệp cưới 4.0',
            'hotline' => '0912 345 678',
            'zalo_url' => 'https://zalo.me/0912345678',
            'facebook_url' => 'https://facebook.com/lsweddingpro',
            'default_domain' => 'thiep.vn',
            'default_card_validity_months' => 18,
            'max_album_photos' => 45,
            'enable_guestbook_default' => '1',
            'enable_banking_qr_default' => '1',
        ];

        $response = $this->post(route('admin.settings.update'), $payload);

        $response->assertRedirect(route('admin.settings.index'));
        $response->assertSessionHas('success');

        $this->assertSame('LS Wedding Pro', SystemSetting::get('site_name'));
        $this->assertSame('thiep.vn', SystemSetting::get('default_domain'));
        $this->assertSame('18', (string) SystemSetting::get('default_card_validity_months'));
        $this->assertSame('45', (string) SystemSetting::get('max_album_photos'));
    }

    public function test_admin_settings_update_fails_validation_when_required_fields_missing(): void
    {
        $response = $this->post(route('admin.settings.update'), [
            'site_name' => '',
            'default_domain' => '',
            'default_card_validity_months' => '',
            'max_album_photos' => '',
        ]);

        $response->assertSessionHasErrors([
            'site_name',
            'default_domain',
            'default_card_validity_months',
            'max_album_photos',
        ]);
    }

    public function test_admin_settings_clear_cache_endpoint_works(): void
    {
        $response = $this->postJson(route('admin.settings.clear-cache'));

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    public function test_admin_settings_test_s3_endpoint_works(): void
    {
        Storage::fake('s3');

        $response = $this->postJson(route('admin.settings.test-s3'));

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }
}
