<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

// Form
Route::get('/', [CandidateController::class, 'create'])->name('candidates.create');

// Xử lý Form
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

// 3. Hiển thị danh sách ứng viên (Trang quản lý)
// Sử dụng GET để truy cập URL: /candidates
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index'); 
