<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Public route
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Authenticated users
Route::middleware(['auth'])->group(function () {

    // 👤 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    // 🔥 Admin dashboard (default after login)
    Route::get('/dashboard', function () {
        return redirect()->route('users.index');
    })->name('dashboard');

    // 🔥 User management
    Route::resource('users', UserController::class);

    // 🔄 Status toggle
    Route::get('user-status/{id}', [UserController::class,'status'])
        ->name('users.status');

    // ⬇ CSV Export
    Route::get('/users-export', [UserController::class, 'export'])
        ->name('users.export');

    // 🔍 AJAX Search
    Route::get('/admin/users/ajax-search',
        [UserController::class, 'ajaxSearch']
    )->name('users.ajax.search');
});

require __DIR__.'/auth.php';
