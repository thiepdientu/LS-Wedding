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

    public function test_home_page_only_displays_active_templates_and_hides_inactive_templates(): void
    {
        // 1. Ensure all active initially
        SystemSetting::set('inactive_templates', '[]', 'templates');

        $initialResponse = $this->get('/');
        $initialResponse->assertStatus(200);
        $initialResponse->assertSee('#5');

        // 2. Hide template 5
        \App\Models\WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(\App\Models\WeddingCard::isTemplateActive('5'));

        $hiddenResponse = $this->get('/');
        $hiddenResponse->assertStatus(200);
        // Template 5 preview should not be on home page
        $hiddenResponse->assertDontSee('#5');
        // Template 1 should still be visible
        $hiddenResponse->assertSee('#1');

        // 3. Reset
        SystemSetting::set('inactive_templates', '[]', 'templates');
    }
}
