<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\AdminAuthController;
use App\Models\Spot;
use App\Models\User;


// ========================================
//  HALAMAN UTAMA
// ========================================
Route::get('/', function () {
    return view('welcome');
})->name('home');


// ========================================
//  FORCE REGISTER (Logout lalu buka register)
// ========================================
Route::get('/force-register', function () {
    if (auth()->check()) auth()->logout();
    return redirect()->route('register');
})->name('force.register');


// ========================================
//  FORCE LOGIN (Logout lalu buka login)
// ========================================
Route::get('/force-login', function () {
    if (auth()->check()) auth()->logout();
    return redirect()->route('login');
})->name('force.login');


// ========================================
//  LOGIN ADMIN
// ========================================
Route::get('/admin-login', [AdminAuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin-login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');


// ========================================
//  USER — LIST SPOT & DETAIL SPOT
// ========================================
Route::middleware('auth')->group(function () {

    // Halaman list spot untuk user
    Route::get('/user/spots', function () {
        $search = request('search');

        $spots = Spot::when($search, function ($query) use ($search) {
            return $query->where('nama_spot', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%")
                ->orWhere('jenis_ikan', 'like', "%$search%")
                ->orWhere('deskripsi', 'like', "%$search%");
        })->get();

        return view('user.spots', compact('spots', 'search'));
    })->name('user.spots');

    // Halaman detail spot
    Route::get('/user/spots/{id}', function ($id) {
        $spot = Spot::findOrFail($id);
        return view('user.detail-spot', compact('spot'));
    })->name('user.spots.detail');

});


// ========================================
//  ADMIN — DASHBOARD & CRUD SPOT
// ========================================
Route::middleware(['auth', 'admin'])->group(function () {

    // ================================
    // DASHBOARD ADMIN (SUDAH DIPERBAIKI)
    // ================================
    Route::get('/admin/dashboard', function () {

        $totalSpot = Spot::count();
        $totalUser = User::count();

        // ---------- Hitung total jenis ikan akurat ----------
        $allJenis = Spot::pluck('jenis_ikan');  
        $listJenis = [];

        foreach ($allJenis as $jenis) {
            if (!$jenis) continue;

            $ikanArray = array_map('trim', explode(',', $jenis));

            foreach ($ikanArray as $ikan) {
                if ($ikan !== '') {
                    $listJenis[] = $ikan;
                }
            }
        }

        $totalJenisIkan = count(array_unique($listJenis));
        // ------------------------------------------------------

        return view('dashboard', compact('totalSpot', 'totalJenisIkan', 'totalUser'));
    })->name('admin.dashboard');

    // CRUD Spot
    Route::resource('spots', SpotController::class);

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ========================================
//  AUTH BAWAAN LARAVEL BREEZE
// ========================================
require __DIR__ . '/auth.php';
