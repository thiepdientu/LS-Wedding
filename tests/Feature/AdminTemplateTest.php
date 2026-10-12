<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTemplateTest extends TestCase
{
    public function test_admin_templates_index_returns_successful_response(): void
    {
        $response = $this->get(route('admin.templates.index'));

        $response->assertStatus(200);
        $response->assertSee('Kho Mẫu Giao Diện');
        $response->assertSee('Mẫu khả dụng');
        $response->assertSee('Hiện đại 01 (Minimal)');
        $response->assertSee('Xem Demo');
        $response->assertSee('Tạo thiệp');
    }

    public function test_admin_wedding_create_preselects_template_from_query_param(): void
    {
        $response = $this->get(route('wedding.create', ['template' => '3']));

        $response->assertStatus(200);
        $response->assertSee('value="3" selected', false);
    }
}
