<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;
use App\Http\Controllers\Admin\WeddingCardController as AdminWeddingCardController;

Route::get('/', function () {
    return view('welcome');
});

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
// Phân hệ Quản trị (Admin Wedding SaaS)
// ==========================================
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.wedding-cards.index');
    });

    Route::get('/wedding-cards', [AdminWeddingCardController::class, 'index'])->name('admin.wedding-cards.index');
    Route::post('/wedding-cards/{id}/toggle-status', [AdminWeddingCardController::class, 'toggleStatus'])->name('admin.wedding-cards.toggle-status');
    Route::get('/wedding-cards/{id}/customer-info', [AdminWeddingCardController::class, 'getCustomerInfo'])->name('admin.wedding-cards.customer-info');
    Route::delete('/wedding-cards/{id}', [AdminWeddingCardController::class, 'destroy'])->name('admin.wedding-cards.destroy');
});


// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/wedding-cards/{id}', [WeddingCardController::class, 'show']); // Lấy chi tiết
// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/weddingInvite/{key}', [WeddingCardController::class, 'showWeddingCardByName']);
// Hiển thị form chỉnh sửa dữ liệu
Route::get('admin/edit/{id}', [WeddingCardController::class, 'edit'])->name('wedding.edit');
// Hiển thị form chỉnh sửa dữ liệu theo tên
Route::get('admin/editByName/{id}', [WeddingCardController::class, 'editByName'])->name('wedding.editByName');
// Cập nhật dữ liệu thiệp cưới
Route::post('/update/{id}', [WeddingCardController::class, 'update'])->name('wedding.update');
Route::get('admin/create', [WeddingCardController::class, 'create'])->name('wedding.create');
Route::post('/wedding-cards/store', [WeddingCardController::class, 'store'])->name('wedding.store');
// Route điều hướng user đến template thiệp
Route::get('/template/{key}', [WeddingCardController::class, 'showTemplate']);
