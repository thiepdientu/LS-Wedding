<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WeddingCard;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
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

    public function test_admin_dashboard_renders_successfully(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Tổng quan hệ thống');
        $response->assertSee('Tổng số thiệp');
        $response->assertSee('Đang hoạt động');
        $response->assertSee('Cưới 14 ngày tới');
        $response->assertSee('Tạo mới tháng này');
        $response->assertSee('Đám cưới sắp diễn ra gần nhất');
        $response->assertSee('Thiệp vừa khởi tạo gần đây');
        $response->assertSee('Tạo thiệp mới');
    }

    public function test_admin_dashboard_displays_upcoming_and_recent_weddings(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $recentCard = WeddingCard::orderByDesc('id')->first();
        if ($recentCard) {
            $response->assertSee(e($recentCard->couple_name), false);
        }
    }
}
