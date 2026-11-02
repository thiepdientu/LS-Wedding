<?php

namespace Tests\Feature;

use App\Models\WeddingCard;
use Tests\TestCase;

class WeddingCardApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_api_returns_public_wedding_cards_list(): void
    {
        $response = $this->getJson(route('api.wedding-cards.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'formatted_id',
                        'identifyWedding',
                        'slug',
                        'invite_url',
                        'template',
                        'template_name',
                        'couple_name',
                        'bride_name',
                        'groom_name',
                        'wedding_date',
                        'wedding_time',
                        'status',
                    ],
                ],
                'pagination' => [
                    'current_page',
                    'last_page',
                    'per_page',
                    'total',
                    'has_more_pages',
                ],
            ]);

        $this->assertTrue($response->json('success'));
    }

    public function test_api_filters_cards_by_search_keyword(): void
    {
        $firstCard = WeddingCard::where('status', 'active')->first();
        if (!$firstCard) {
            $this->markTestSkipped('No active wedding cards found.');
        }

        $response = $this->getJson(route('api.wedding-cards.index', [
            'search' => $firstCard->bride_name,
        ]));

        $response->assertStatus(200);
        $items = $response->json('data');
        $this->assertNotEmpty($items);
        $this->assertEquals($firstCard->id, $items[0]['id']);
    }

    public function test_api_filters_cards_by_template(): void
    {
        $firstCard = WeddingCard::where('status', 'active')->first();
        if (!$firstCard) {
            $this->markTestSkipped('No active wedding cards found.');
        }

        $response = $this->getJson(route('api.wedding-cards.index', [
            'template' => $firstCard->template,
        ]));

        $response->assertStatus(200);
        $items = $response->json('data');
        foreach ($items as $item) {
            $this->assertEquals((string) $firstCard->template, (string) $item['template']);
        }
    }

    public function test_api_supports_unpaginated_mode(): void
    {
        $response = $this->getJson(route('api.wedding-cards.index', ['all' => 1]));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'total',
                'data',
            ]);

        $this->assertIsArray($response->json('data'));
    }

    public function test_api_supports_full_details_mode(): void
    {
        $response = $this->getJson(route('api.wedding-cards.index', ['full' => 1]));

        $response->assertStatus(200);
        $items = $response->json('data');
        if (!empty($items)) {
            $this->assertArrayHasKey('bride', $items[0]);
            $this->assertArrayHasKey('groom', $items[0]);
            $this->assertArrayHasKey('ceremony', $items[0]);
            $this->assertArrayHasKey('media', $items[0]);
            $this->assertArrayHasKey('content', $items[0]);
        }
    }

    public function test_api_returns_single_wedding_card_by_id(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $response = $this->getJson(route('api.wedding-cards.show', $card->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $card->id,
                    'identifyWedding' => $card->identifyWedding,
                ],
            ]);
    }

    public function test_api_returns_single_wedding_card_by_slug(): void
    {
        $card = WeddingCard::first();
        if (!$card) {
            $this->markTestSkipped('No wedding cards found.');
        }

        $response = $this->getJson(route('api.wedding-cards.show', $card->identifyWedding));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $card->id,
                    'slug' => $card->identifyWedding,
                ],
            ]);
    }

    public function test_api_returns_404_for_nonexistent_card(): void
    {
        $response = $this->getJson(route('api.wedding-cards.show', 'slug-khong-ton-tai-xyz-9999'));

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => 'Không tìm thấy thiệp cưới.',
            ]);
    }
}
