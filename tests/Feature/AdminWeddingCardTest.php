<?php

namespace Tests\Feature;

use App\Models\WeddingCard;
use Tests\TestCase;

class AdminWeddingCardTest extends TestCase
{
    public function test_admin_root_redirects_to_wedding_cards_index(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect(route('admin.wedding-cards.index'));
    }

    public function test_admin_wedding_cards_index_returns_successful_response(): void
    {
        $response = $this->get(route('admin.wedding-cards.index'));

        $response->assertStatus(200);
        $response->assertSee('Quản lý Danh sách Thiệp');
        $response->assertSee('Thêm thiệp mới');
    }

    public function test_admin_search_filters_wedding_cards(): void
    {
        $response = $this->get(route('admin.wedding-cards.index', ['search' => 'Mai']));

        $response->assertStatus(200);
        $response->assertSee('Mai');
    }

    public function test_admin_status_filter(): void
    {
        WeddingCard::where('id', '>', 0)->first()?->update(['status' => 'locked']);

        $response = $this->get(route('admin.wedding-cards.index', ['status' => 'locked']));

        $response->assertStatus(200);
        $response->assertSee('Đã ẩn (Khóa)');
    }

    public function test_admin_toggle_status_endpoint(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found to toggle.');
        }

        $oldStatus = $card->status;
        $response = $this->postJson(route('admin.wedding-cards.toggle-status', $card->id));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true
        ]);

        $card->refresh();
        $this->assertNotEquals($oldStatus, $card->status);

        // Toggle back to preserve state
        $this->postJson(route('admin.wedding-cards.toggle-status', $card->id));
    }

    public function test_admin_customer_info_endpoint(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $response = $this->getJson(route('admin.wedding-cards.customer-info', $card->id));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'id',
                'formatted_id',
                'couple_name',
                'customer_email',
            ]
        ]);
    }

    public function test_wedding_card_edit_view_loads_successfully(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $response = $this->get(route('wedding.edit', $card->id));

        $response->assertStatus(200);
        $response->assertSee('Chỉnh sửa:');
        $response->assertSee('Thông tin Lễ Thành Hôn Chính');
        $response->assertSee('wed.vn/');
    }

    public function test_wedding_card_update_submits_successfully(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $response = $this->post(route('wedding.update', $card->id), [
            'identifyWedding' => $card->identifyWedding,
            'template' => $card->template,
            'status' => 'active',
            'bride_name' => 'Ngọc Mai Mới',
            'groom_name' => 'Thế Hùng Mới',
            'wedding_date' => '2026-11-20',
            'wedding_time' => '11:30',
            'customer_email' => 'hungmai.updated@email.com',
        ]);

        $response->assertRedirect(route('wedding.edit', $card->id));
        $response->assertSessionHas('success');

        $card->refresh();
        $this->assertEquals('Ngọc Mai Mới', $card->bride_name);
        $this->assertEquals('hungmai.updated@email.com', $card->customer_email);
    }

    public function test_album_manifest_reorders_and_deletes_images(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        // Setup 3 initial photos
        $initialAlbum = ['https://img.test/1.jpg', 'https://img.test/2.jpg', 'https://img.test/3.jpg'];
        $card->update(['album' => json_encode($initialAlbum)]);

        // Send manifest where photo 2 was deleted, and photo 3 was moved before photo 1
        $manifest = [
            ['type' => 'existing', 'url' => 'https://img.test/3.jpg'],
            ['type' => 'existing', 'url' => 'https://img.test/1.jpg'],
        ];

        $response = $this->post(route('wedding.update', $card->id), [
            'identifyWedding' => $card->identifyWedding,
            'template' => $card->template,
            'bride_name' => $card->bride_name,
            'groom_name' => $card->groom_name,
            'wedding_date' => '2026-11-20',
            'wedding_time' => '11:30',
            'album_manifest' => json_encode($manifest),
        ]);

        $response->assertRedirect(route('wedding.edit', $card->id));

        $card->refresh();
        $this->assertEquals(
            json_encode(['https://img.test/3.jpg', 'https://img.test/1.jpg']),
            $card->album
        );
    }

    public function test_album_manifest_adds_new_image(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $fakeFile = \Illuminate\Http\UploadedFile::fake()->create('wedding_party.jpg', 100, 'image/jpeg');

        $manifest = [
            ['type' => 'existing', 'url' => 'https://img.test/original.jpg'],
            ['type' => 'new', 'key' => 'new_photo_test'],
        ];

        $response = $this->post(route('wedding.update', $card->id), [
            'identifyWedding' => $card->identifyWedding,
            'template' => $card->template,
            'bride_name' => $card->bride_name,
            'groom_name' => $card->groom_name,
            'wedding_date' => '2026-11-20',
            'wedding_time' => '11:30',
            'album_manifest' => json_encode($manifest),
            'album_new_files' => [
                'new_photo_test' => $fakeFile,
            ],
        ]);

        $response->assertRedirect(route('wedding.edit', $card->id));

        $card->refresh();
        $savedAlbum = json_decode($card->album, true);

        $this->assertCount(2, $savedAlbum);
        $this->assertEquals('https://img.test/original.jpg', $savedAlbum[0]);
        $this->assertStringContainsString('weddings/' . $card->id, $savedAlbum[1]);
    }
}
