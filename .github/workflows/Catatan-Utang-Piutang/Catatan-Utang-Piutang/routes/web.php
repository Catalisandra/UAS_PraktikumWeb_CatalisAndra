<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;

// Redirect root URL ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard → Tampilkan halaman utama dashboard.blade.php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup route yang hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pelanggan (Customers)
    Route::resource('form-step/customers', CustomerController::class)->names([
        'index'   => 'customers.index',
        'create'  => 'customers.create',
        'store'   => 'customers.store',
        'edit'    => 'customers.edit',
        'update'  => 'customers.update',
        'destroy' => 'customers.destroy',
    ]);

    // Transaksi (Transactions)
    Route::resource('form-step/transactions', TransactionController::class)->names([
        'index'   => 'transactions.index',
        'create'  => 'transactions.create',
        'store'   => 'transactions.store',
        'edit'    => 'transactions.edit',
        'update'  => 'transactions.update',
        'destroy' => 'transactions.destroy',
    ]);

    // Pembayaran (Payments)
    Route::resource('form-step/payments', PaymentController::class)->names([
        'index'   => 'payments.index',
        'create'  => 'payments.create',
        'store'   => 'payments.store',
        'edit'    => 'payments.edit',
        'update'  => 'payments.update',
        'destroy' => 'payments.destroy',
    ]);

});

require __DIR__.'/auth.php';
