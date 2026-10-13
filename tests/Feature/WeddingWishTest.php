<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WeddingCard;
use App\Models\WeddingWish;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class WeddingWishTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $admin = User::firstOrCreate(['username' => 'admin'], [
            'name' => 'Administrator',
            'email' => 'admin@lswedding.vn',
            'password' => Hash::make('S0ntit199.,@'),
        ]);
        $this->actingAs($admin);
    }

    public function test_can_submit_wedding_wish_via_api()
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No WeddingCard available');
        }

        // Đảm bảo card không bị locked trong test submit lời chúc
        $card->update(['status' => 'active']);

        $response = $this->postJson("/wedding-cards/{$card->id}/wishes", [
            'sender_name' => 'Nguyễn Văn A',
            'message' => 'Chúc hai bạn trăm năm hạnh phúc!',
            'attendance_status' => 'attending',
            'guest_count' => 2,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'sender_name' => 'Nguyễn Văn A',
                    'message' => 'Chúc hai bạn trăm năm hạnh phúc!',
                    'attendance_status' => 'attending',
                    'guest_count' => 2,
                ]
            ]);

        $this->assertDatabaseHas('wedding_wishes', [
            'wedding_card_id' => $card->id,
            'sender_name' => 'Nguyễn Văn A',
            'attendance_status' => 'attending',
        ]);
    }

    public function test_can_fetch_approved_wishes_for_card()
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No WeddingCard available');
        }

        $wish = WeddingWish::create([
            'wedding_card_id' => $card->id,
            'sender_name' => 'Bạn Thân',
            'message' => 'Happy wedding!',
            'attendance_status' => 'attending',
            'guest_count' => 1,
            'is_approved' => true,
        ]);

        $response = $this->getJson("/wedding-cards/{$card->id}/wishes");

        $response->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJsonFragment([
                'sender_name' => 'Bạn Thân',
                'message' => 'Happy wedding!',
            ]);
    }

    public function test_admin_can_access_wishes_management()
    {
        $response = $this->get('/admin/wishes');
        $response->assertStatus(200);
        $response->assertSee('Quản lý Lời chúc');
    }

    public function test_admin_can_toggle_wish_approval()
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No Card available');
        }

        $wish = WeddingWish::create([
            'wedding_card_id' => $card->id,
            'sender_name' => 'Khách Mời',
            'message' => 'Thử nghiệm duyệt',
            'is_approved' => true,
        ]);

        $response = $this->postJson("/admin/wishes/{$wish->id}/toggle-approval");
        $response->assertStatus(200)
            ->assertJson(['success' => true, 'is_approved' => false]);

        $this->assertDatabaseHas('wedding_wishes', [
            'id' => $wish->id,
            'is_approved' => false,
        ]);
    }

    public function test_admin_can_delete_wish()
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No Card available');
        }

        $wish = WeddingWish::create([
            'wedding_card_id' => $card->id,
            'sender_name' => 'Cần Xóa',
            'message' => 'Nội dung spam',
            'is_approved' => false,
        ]);

        $response = $this->delete("/admin/wishes/{$wish->id}");
        $response->assertRedirect('/admin/wishes');

        $this->assertDatabaseMissing('wedding_wishes', [
            'id' => $wish->id,
        ]);
    }

    public function test_admin_can_export_wishes_csv()
    {
        $response = $this->get('/admin/wishes/export');
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
    }
}
