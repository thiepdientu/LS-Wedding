<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Làm thiệp cưới online', false);
        $response->assertSee('Tư Vấn Tạo Thiệp');
        $response->assertSee('Mẫu thiệp cưới online', false);
        $response->assertSee('Tạo thiệp cưới chỉ trong', false);
        $response->assertSee('Mừng cưới QR thông minh');
        $response->assertSee('Mỗi khách 1 link riêng');
        $response->assertSee('Câu hỏi thường gặp về thiệp cưới online');
    }

    public function test_home_page_does_not_contain_admin_links(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('/admin/create');
        $response->assertDontSee('/admin/templates');
        $response->assertDontSee('/admin/dashboard');
        $response->assertDontSee('/admin/settings');
    }

    public function test_home_page_displays_system_setting_site_name(): void
    {
        SystemSetting::set('site_name', 'Wedding VIP Test');

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Wedding VIP Test');
    }
}
