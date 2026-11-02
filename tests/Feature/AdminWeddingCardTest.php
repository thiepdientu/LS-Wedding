<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WeddingCard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminWeddingCardTest extends TestCase
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

    public function test_admin_root_redirects_to_dashboard(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_wedding_cards_index_returns_successful_response(): void
    {
        $response = $this->get(route('admin.wedding-cards.index'));

        $response->assertStatus(200);
        $response->assertSee('Quản lý Danh sách Thiệp');
        $response->assertSee('Thêm thiệp mới');
        $response->assertSee('THỜI GIAN THÀNH HÔN');
    }

    public function test_admin_wedding_cards_index_defaults_to_no_date_filter(): void
    {
        $response = $this->get(route('admin.wedding-cards.index'));

        $response->assertStatus(200);
        $response->assertSee('Tất cả thời gian (chọn để lọc)...');
    }

    public function test_admin_search_filters_wedding_cards(): void
    {
        $response = $this->get(route('admin.wedding-cards.index', ['search' => 'Mai']));

        $response->assertStatus(200);
        $response->assertSee('Mai');
    }

    public function test_admin_status_filter(): void
    {
        $card = WeddingCard::where('id', '>', 0)->first();
        $oldStatus = $card?->status ?? 'active';
        $card?->update(['status' => 'locked']);

        $response = $this->get(route('admin.wedding-cards.index', ['status' => 'locked', 'date_range' => '']));

        $response->assertStatus(200);
        $response->assertSee('Đã ẩn (Khóa)');

        // Khôi phục lại trạng thái ban đầu để không ảnh hưởng các test khác
        $card?->update(['status' => $oldStatus]);
    }

    public function test_admin_template_filter(): void
    {
        $response = $this->get(route('admin.wedding-cards.index', ['template' => '1']));

        $response->assertStatus(200);
        $response->assertSee('Tất cả mẫu thiệp');
        $response->assertSee('Hiện đại 01 (Minimal)');
    }

    public function test_admin_wedding_date_range_filter(): void
    {
        $baseCard = WeddingCard::first();
        if (!$baseCard) {
            $this->markTestSkipped('No wedding cards found.');
        }

        // Đảm bảo có dữ liệu thiệp cưới tháng 10 và tháng 11
        $cardOct = WeddingCard::updateOrCreate(
            ['identifyWedding' => 'test-oct-filter'],
            array_merge($baseCard->toArray(), [
                'identifyWedding' => 'test-oct-filter',
                'groom_name' => 'Gia Huy',
                'bride_name' => 'Phương Anh',
                'wedding_date' => '2026-10-17',
            ])
        );

        $cardNov = WeddingCard::updateOrCreate(
            ['identifyWedding' => 'test-nov-filter'],
            array_merge($baseCard->toArray(), [
                'identifyWedding' => 'test-nov-filter',
                'groom_name' => 'Thế Hùng Mới',
                'bride_name' => 'Ngọc Mai Mới',
                'wedding_date' => '2026-11-20',
            ])
        );

        // Lọc tháng 10/2026: chỉ có thiệp cưới ngày 17/10/2026
        $response = $this->get(route('admin.wedding-cards.index', [
            'date_range' => '01/10/2026 - 31/10/2026'
        ]));

        $response->assertStatus(200);
        $response->assertSee('Gia Huy & Phương Anh');
        $response->assertDontSee('Thế Hùng Mới & Ngọc Mai Mới');

        // Lọc tháng 11/2026 bằng dấu phân cách "đến" của Flatpickr
        $responseVietnamese = $this->get(route('admin.wedding-cards.index', [
            'date_range' => '01/11/2026 đến 30/11/2026'
        ]));

        $responseVietnamese->assertStatus(200);
        $responseVietnamese->assertSee('Thế Hùng Mới & Ngọc Mai Mới');
        $responseVietnamese->assertDontSee('Gia Huy & Phương Anh');

        // Clean up test cards
        $cardOct->delete();
        $cardNov->delete();
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

    public function test_wedding_card_edit_view_loads_by_slug_successfully(): void
    {
        $card = WeddingCard::whereNotNull('identifyWedding')->where('identifyWedding', '!=', '')->first();
        if (!$card) {
            $this->markTestSkipped('No wedding card with slug found.');
        }

        $response = $this->get(route('wedding.edit', $card->identifyWedding));

        $response->assertStatus(200);
        $response->assertSee('Chỉnh sửa:');
    }

    public function test_wedding_card_edit_view_returns_404_for_invalid_card(): void
    {
        $response = $this->get(route('wedding.edit', 'non-existent-wedding-slug-999999'));

        $response->assertStatus(404);
    }

    public function test_wedding_card_update_submits_successfully(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $origBride = $card->bride_name;
        $origGroom = $card->groom_name;
        $origDate = $card->wedding_date?->format('Y-m-d');
        $origEmail = $card->customer_email;

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

        // Revert to original state to preserve database consistency across tests
        $card->update([
            'bride_name' => $origBride,
            'groom_name' => $origGroom,
            'wedding_date' => $origDate,
            'customer_email' => $origEmail,
        ]);
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

    public function test_public_wedding_invite_route_renders_card_by_slug_and_id(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        // Test with slug (identifyWedding)
        $slugResponse = $this->get('/weddingInvite/' . $card->identifyWedding);
        $slugResponse->assertStatus(200);

        // Test with numeric id fallback
        $idResponse = $this->get('/weddingInvite/' . $card->id);
        $idResponse->assertStatus(200);
    }

    public function test_public_wedding_invite_returns_404_for_invalid_card(): void
    {
        $response = $this->get('/weddingInvite/slug-khong-ton-tai-999999');
        $response->assertStatus(404);
    }

    public function test_wedding_card_store_creates_card_successfully_without_album_input(): void
    {
        $uniqueSlug = 'test-slug-' . uniqid();
        $payload = [
            'identifyWedding' => $uniqueSlug,
            'template' => '22',
            'wedding_time' => '11:00',
            'banner_preview' => 'https://example.com/banner_preview.jpg',
            'bride_name' => 'Ngọc Linh',
            'groom_name' => 'Sơn Tít',
            'banner_top' => 'https://example.com/banner_top.jpg',
            'wedding_date' => '2026-11-20',
            'wedding_message' => 'Lễ Thành Hôn',
            'address_wedding' => 'Xóm 8 Lưu Xá - Hòa Phú - Hà Nội',
            'name_place_wedding' => 'Trường mầm non thôn Lưu Xá',
            'address_wedding_map' => 'https://maps.app.goo.gl/tugKmQ3zF13oSvD78',
            'bride_birthday' => '2026-11-26',
            'groom_birthday' => '2026-11-20',
            'bride_avatar' => 'https://example.com/bride.jpg',
            'groom_avatar' => 'https://example.com/groom.jpg',
            'des_bride' => 'Cô dâu thích cười',
            'des_groom' => 'Chú rể hướng ngoại',
            'banner_love_story' => 'https://example.com/story.jpg',
            'love_story' => '20/9/2023: Hẹn Hò',
            'banner_coundown' => 'https://example.com/countdown.jpg',
            'date_coundown' => '2026-11-20 14:00:00',
            'address_groom' => 'Xóm 8 Lưu Xá - Hòa Phú - Hà Nội',
            'address_bride' => 'Xóm 8 Lưu Xá - Hòa Phú - Hà Nội',
            'groom_eating_title' => 'Tiệc Nhà Trai',
            'bride_eating_title' => 'Tiệc Nhà Gái',
            'groom_eating_date' => '2026-11-20',
            'bride_eating_date' => '2026-11-20',
            'time_groom' => '11:00',
            'time_groom_al' => 'Tức ngày 2 tháng 11 năm Ất Tỵ',
            'time_bride' => '11:00',
            'time_bride_al' => 'Tức ngày 10 tháng 10 năm Ất Tỵ',
            'bride_phone' => '0984352391',
            'groom_phone' => '0984352391',
            'message_invite' => 'Trân trọng kính mời',
            'message_gift' => 'Gửi quà chúc phúc',
            'banner_thanks' => 'https://example.com/thanks.jpg',
            'message_thanks' => 'Sự hiện diện của quý khách là niềm vui',
            'groom_qr' => 'https://example.com/groom_qr.jpg',
            'bride_qr' => 'https://example.com/bride_qr.jpg',
            'groom_map' => 'https://maps.app.goo.gl/tugKmQ3zF13oSvD78',
            'bride_map' => 'https://maps.app.goo.gl/D8u9HRVRwYBo6oHk7',
            'groom_father_name' => 'Trần Văn Vinh',
            'groom_mother_name' => 'Hồ Thị Xuyến',
            'groom_rank' => 'Trưởng Nam',
            'bride_father_name' => 'Nguyễn Bá Thu',
            'bride_mother_name' => 'Nguyễn Thị Núp',
            'bride_rank' => 'Út Nữ',
            'dresscode_note' => 'Xin quý khách vui lòng chọn trang phục theo tông màu gợi ý.',
            'wedding_date_al' => 'Ngày 10 tháng 11 năm Bính Ngọ',
            'groom_bank_name' => 'Vietcombank',
            'groom_bank_account' => '999999999',
            'groom_bank_owner' => 'TRAN VAN SON',
            'bride_bank_name' => 'BIDV',
            'bride_bank_account' => '8888888888',
            'bride_bank_owner' => 'NGUYEN THI NGOC LINH',
            'music_url' => 'https://example.com/music.mp3',
        ];

        $response = $this->post(route('wedding.store'), $payload);
        $response->assertRedirect(route('wedding.create'));
        $response->assertSessionHas('success');

        $created = WeddingCard::where('identifyWedding', $uniqueSlug)->first();
        $this->assertNotNull($created);
        $this->assertEquals('Ngọc Linh', $created->bride_name);
        $this->assertEquals('Sơn Tít', $created->groom_name);
        $this->assertNotNull($created->album);

        // Clean up test card
        $created->delete();
    }
}
