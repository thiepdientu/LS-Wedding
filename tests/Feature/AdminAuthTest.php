<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Đảm bảo tài khoản admin mặc định tồn tại
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@lswedding.vn',
                'password' => Hash::make('S0ntit199.,@'),
            ]
        );

        RateLimiter::clear('admin|127.0.0.1');
        RateLimiter::clear('admin@lswedding.vn|127.0.0.1');
    }

    public function test_unauthenticated_user_is_redirected_to_admin_login()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/wedding-cards');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/wishes');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/settings');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_renders_successfully()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('WeddingSaaS');
        $response->assertSee('Tên đăng nhập hoặc Email');
    }

    public function test_authenticated_admin_is_redirected_from_login_page()
    {
        $admin = User::where('username', 'admin')->first();

        $response = $this->actingAs($admin)->get('/admin/login');
        $response->assertRedirect('/admin/dashboard');
    }

    public function test_admin_can_login_with_username()
    {
        $admin = User::where('username', 'admin')->first();

        $response = $this->post('/admin/login', [
            'login' => 'admin',
            'password' => 'S0ntit199.,@',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_can_login_with_email()
    {
        $admin = User::where('username', 'admin')->first();

        $response = $this->post('/admin/login', [
            'login' => 'admin@lswedding.vn',
            'password' => 'S0ntit199.,@',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_login_fails_with_invalid_credentials()
    {
        $response = $this->post('/admin/login', [
            'login' => 'admin',
            'password' => 'sai_mat_khau_123',
        ]);

        $response->assertSessionHasErrors('login');
        $this->assertGuest();
    }

    public function test_admin_can_logout()
    {
        $admin = User::where('username', 'admin')->first();

        $response = $this->actingAs($admin)->post('/admin/logout');
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
