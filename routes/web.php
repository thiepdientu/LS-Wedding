<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;

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

Route::get('admin/all-wedding', function () {
    try {
         DB::connection()->getPdo();
         $cards = DB::select("SELECT * FROM wedding_cards;");
         dd($cards);

    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});


// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/wedding-cards/{id}', [WeddingCardController::class, 'show']); // Lấy chi tiết
// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/weddingInvite/{key}', [WeddingCardController::class, 'showWeddingCardByName']);
// Hiển thị form chỉnh sửa dữ liệu
Route::get('admin/edit/{id}', [WeddingCardController::class, 'edit'])->name('wedding.edit');
// Hiển thị form chỉnh sửa dữ liệu theo tên
Route::get('admin/editByName/{id}', [WeddingCardController::class, 'editByName'])->name('wedding.edit');
// Cập nhật dữ liệu thiệp cưới
Route::post('/update/{id}', [WeddingCardController::class, 'update'])->name('wedding.update');
Route::get('admin/create', [WeddingCardController::class, 'create'])->name('wedding.create');
Route::post('/wedding-cards/store', [WeddingCardController::class, 'store'])->name('wedding.store');
// Route điều hướng user đến template thiệp
Route::get('/template/{key}', [WeddingCardController::class, 'showTemplate']);
