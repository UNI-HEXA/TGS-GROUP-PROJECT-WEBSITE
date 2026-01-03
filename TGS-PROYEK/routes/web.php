<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MerchandiseController;
use App\Http\Controllers\Admin\TicketController;

// ==================== PUBLIC ROUTES (Tanpa Auth) ====================
Route::get('/', function () {
    return view('dashboard'); // resources/views/dashboard.blade.php
})->name('dashboard');

Route::get('/overview', [PageController::class, 'overview'])->name('overview');
Route::get('/tickets', [PageController::class, 'tickets'])->name('tickets');
Route::get('/event', [PageController::class, 'event'])->name('event');
Route::get('/social', [PageController::class, 'social'])->name('social');
Route::get('/map', [PageController::class, 'map'])->name('map');
Route::get('/exhibitors', [PageController::class, 'exhibitors'])->name('exhibitors');
Route::get('/merchandise', [PageController::class, 'merchandise'])->name('merchandise'); // Merchandise publik
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/business', [PageController::class, 'business'])->name('business');

// ==================== AUTH ROUTES ====================
Auth::routes();

// ==================== ADMIN ROUTES (Protected by Auth) ====================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Redirect root /admin to dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // ===== MERCHANDISE ADMIN CRUD ROUTES =====
    Route::prefix('merchandise')->name('merchandise.')->group(function () {
        Route::get('/', [MerchandiseController::class, 'index'])->name('index');
        Route::get('/create', [MerchandiseController::class, 'create'])->name('create');
        Route::post('/', [MerchandiseController::class, 'store'])->name('store');
        Route::get('/{merchandise}/edit', [MerchandiseController::class, 'edit'])->name('edit');
        Route::put('/{merchandise}', [MerchandiseController::class, 'update'])->name('update');
        Route::delete('/{merchandise}', [MerchandiseController::class, 'destroy'])->name('destroy');
    });

    // ===== TICKET ADMIN CRUD ROUTES =====
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        Route::post('/', [TicketController::class, 'store'])->name('store');
        Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
        Route::put('/{ticket}', [TicketController::class, 'update'])->name('update');
        Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
    });

});

// ==================== REDIRECT AFTER LOGIN ====================
// Setelah login, redirect ke admin dashboard
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->name('home');
