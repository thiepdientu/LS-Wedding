<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;
use App\Http\Controllers\Admin\WeddingCardController as AdminWeddingCardController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WishController as AdminWishController;
use App\Http\Controllers\WeddingWishController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/test-s3', function () {
    try {
        Storage::disk('s3')->put('test.txt', 'Hello from Laravel');
        return 'Kết nối S3 thành công!';
    } catch (\Exception $e) {
        return 'Lỗi kết nối S3: ' . $e->getMessage();
    }
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $cards = DB::select("SELECT * FROM wedding_cards;");
        return "Kết nối MySQL thành công!";
    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});

// ==========================================
// Xác thực Quản trị (Admin Authentication)
// ==========================================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// ==========================================
// Phân hệ Quản trị (Admin Wedding SaaS - Yêu cầu Đăng nhập)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        // Bảng điều khiển tổng quan (Dashboard)
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Quản lý danh sách thiệp
        Route::get('/wedding-cards', [AdminWeddingCardController::class, 'index'])->name('admin.wedding-cards.index');
        Route::post('/wedding-cards/{id}/toggle-status', [AdminWeddingCardController::class, 'toggleStatus'])->name('admin.wedding-cards.toggle-status');
        Route::get('/wedding-cards/{id}/customer-info', [AdminWeddingCardController::class, 'getCustomerInfo'])->name('admin.wedding-cards.customer-info');
        Route::delete('/wedding-cards/{id}', [AdminWeddingCardController::class, 'destroy'])->name('admin.wedding-cards.destroy');

        // Form Tạo & Chỉnh sửa thiệp
        Route::get('/create', [WeddingCardController::class, 'create'])->name('wedding.create');
        Route::get('/edit/{id}', [WeddingCardController::class, 'edit'])->name('wedding.edit');
        Route::get('/editByName/{id}', [WeddingCardController::class, 'editByName'])->name('wedding.editByName');

        // Quản lý mẫu giao diện (Templates)
        Route::get('/templates', [TemplateController::class, 'index'])->name('admin.templates.index');

        // Quản lý Lời chúc & Sổ lưu bút (Wishes)
        Route::get('/wishes', [AdminWishController::class, 'index'])->name('admin.wishes.index');
        Route::post('/wishes/{id}/toggle-approval', [AdminWishController::class, 'toggleApproval'])->name('admin.wishes.toggle-approval');
        Route::delete('/wishes/{id}', [AdminWishController::class, 'destroy'])->name('admin.wishes.destroy');
        Route::get('/wishes/export', [AdminWishController::class, 'export'])->name('admin.wishes.export');

        // Cài đặt hệ thống (System Settings)
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
        Route::post('/settings/test-s3', [SettingController::class, 'testS3'])->name('admin.settings.test-s3');
        Route::post('/settings/clear-cache', [SettingController::class, 'clearCache'])->name('admin.settings.clear-cache');
    });

    // Thao tác Lưu / Cập nhật thiệp cưới (Admin)
    Route::post('/update/{id}', [WeddingCardController::class, 'update'])->name('wedding.update');
    Route::post('/wedding-cards/store', [WeddingCardController::class, 'store'])->name('wedding.store');
});
// Route điều hướng user đến template thiệp
Route::get('/template/{key}', [WeddingCardController::class, 'showTemplate']);

// ==========================================
// API Lời chúc & Sổ lưu bút Công khai (Public Guest Wishes)
// ==========================================
Route::post('/wedding-cards/{id}/wishes', [WeddingWishController::class, 'store'])->name('wishes.store');
Route::get('/wedding-cards/{id}/wishes', [WeddingWishController::class, 'index'])->name('wishes.index');
