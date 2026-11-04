<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
use App\Models\User;
use App\Models\WeddingCard;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTemplateTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        // Reset inactive templates setting before each test
        SystemSetting::set('inactive_templates', '[]', 'templates');

        $this->admin = User::firstOrCreate(['username' => 'admin'], [
            'name' => 'Administrator',
            'email' => 'admin@lswedding.vn',
            'password' => Hash::make('S0ntit199.,@'),
        ]);
        $this->actingAs($this->admin);
    }

    protected function tearDown(): void
    {
        SystemSetting::set('inactive_templates', '[]', 'templates');
        parent::tearDown();
    }

    public function test_admin_templates_index_returns_successful_response(): void
    {
        $response = $this->get(route('admin.templates.index'));

        $response->assertStatus(200);
        $response->assertSee('Kho Mẫu Giao Diện');
        $response->assertSee('Mẫu khả dụng');
        $response->assertSee('Hiện đại 01 (Minimal)');
        $response->assertSee('Xem Demo');
        $response->assertSee('Tạo thiệp');
        $response->assertSee('Đang hoạt động');
        $response->assertSee('Đang tạm ngưng');
    }

    public function test_admin_wedding_create_preselects_template_from_query_param(): void
    {
        $response = $this->get(route('wedding.create', ['template' => '3']));

        $response->assertStatus(200);
        $response->assertSee('value="3" selected', false);
    }

    public function test_admin_can_toggle_template_status_via_ajax(): void
    {
        // 1. Template '5' is initially active
        $this->assertTrue(WeddingCard::isTemplateActive('5'));

        // 2. Toggle to inactive
        $response = $this->postJson(route('admin.templates.toggle-status', ['code' => '5']));
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => '5',
                'is_active' => false,
            ]);

        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        // 3. Toggle back to active
        $responseAgain = $this->postJson(route('admin.templates.toggle-status', ['code' => '5']));
        $responseAgain->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => '5',
                'is_active' => true,
            ]);

        $this->assertTrue(WeddingCard::isTemplateActive('5'));
    }

    public function test_toggle_non_existent_template_returns_404(): void
    {
        $response = $this->postJson(route('admin.templates.toggle-status', ['code' => '99999']));
        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
            ]);
    }

    public function test_inactive_template_is_not_displayed_in_wedding_create_form(): void
    {
        // Deactivate template 5
        WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        $response = $this->get(route('wedding.create'));
        $response->assertStatus(200);
        // Template 5 should not be in the selection list
        $response->assertDontSee('value="5"', false);
        // Template 1 should still be present
        $response->assertSee('value="1"', false);
    }

    public function test_existing_wedding_card_with_inactive_template_still_renders_in_edit_form(): void
    {
        $baseCard = WeddingCard::first();
        if (!$baseCard) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $card = WeddingCard::updateOrCreate(
            ['identifyWedding' => 'test-inactive-card'],
            array_merge($baseCard->toArray(), [
                'identifyWedding' => 'test-inactive-card',
                'template' => '5',
            ])
        );

        // Deactivate template 5
        WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        $response = $this->get(route('wedding.edit', ['id' => $card->id]));
        $response->assertStatus(200);
        // The inactive template 5 should be present because this existing card uses it
        $response->assertSee('value="5"', false);
        $response->assertSee('(Đã tạm ngưng)');

        // Cleanup
        $card->delete();
    }

    public function test_guest_cannot_preview_inactive_template(): void
    {
        WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        // Logout admin
        auth()->logout();

        $response = $this->get(route('wedding.template', ['key' => '5']));
        $response->assertStatus(404);
    }

    public function test_admin_can_still_preview_inactive_template(): void
    {
        WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        // Admin is still logged in
        $response = $this->actingAs($this->admin)->get(route('wedding.template', ['key' => '5']));
        // Should not be 404 because admin has privilege to preview
        $response->assertStatus(200);
    }

    public function test_store_wedding_card_fails_validation_if_template_is_inactive(): void
    {
        WeddingCard::toggleTemplateStatus('5');
        $this->assertFalse(WeddingCard::isTemplateActive('5'));

        $response = $this->post(route('wedding.store'), [
            'identifyWedding' => 'test-inactive-store-' . time(),
            'template' => '5',
            'wedding_time' => '10:00',
            'wedding_date' => '2026-12-12',
            'bride_name' => 'Cô dâu',
            'groom_name' => 'Chú rể',
            'des_bride' => 'Mô tả',
            'des_groom' => 'Mô tả',
            'wedding_message' => 'Lời mời',
            'address_wedding' => 'Địa chỉ',
            'name_place_wedding' => 'Nơi cưới',
            'address_wedding_map' => 'Bản đồ',
            'bride_birthday' => '1995-01-01',
            'groom_birthday' => '1993-01-01',
        ]);

        $response->assertSessionHasErrors(['template']);
    }
}
