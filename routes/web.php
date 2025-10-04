<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

// Form
Route::get('/', [CandidateController::class, 'create'])->name('candidates.create');

// Xử lý Form
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
