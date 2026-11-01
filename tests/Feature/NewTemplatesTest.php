<?php

namespace Tests\Feature;

use App\Models\WeddingCard;
use Tests\TestCase;

class NewTemplatesTest extends TestCase
{
    public function test_all_new_templates_registered_in_model(): void
    {
        $templates = WeddingCard::getTemplateOptions();
        $this->assertCount(36, $templates); // 1, 1n, 2..21 (22 templates) + 22..35 (14 templates) = 36 templates

        for ($i = 22; $i <= 35; $i++) {
            $this->assertArrayHasKey((string) $i, $templates);
        }
    }

    public function test_new_templates_render_successfully(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding card found in database.');
        }

        $originalTemplate = $card->template;

        for ($i = 22; $i <= 35; $i++) {
            $card->template = (string) $i;
            $card->save();

            // Test viewing actual card with this template
            $response = $this->get('/weddingInvite/' . $card->identifyWedding);
            $response->assertStatus(200);

            // Test demo route
            $demoResponse = $this->get('/template/' . $i);
            $demoResponse->assertStatus(200);
        }

        // Restore original template
        $card->template = $originalTemplate;
        $card->save();
    }

    public function test_admin_template_catalog_includes_new_templates(): void
    {
        $admin = \App\Models\User::first();
        if (!$admin) {
            $admin = \App\Models\User::factory()->create();
        }

        $response = $this->actingAs($admin)->get(route('admin.templates.index'));
        $response->assertStatus(200);
        $response->assertSee('Minimal Đỏ Đậm');
        $response->assertSee('Anh Đào Hồng New');
    }
}
