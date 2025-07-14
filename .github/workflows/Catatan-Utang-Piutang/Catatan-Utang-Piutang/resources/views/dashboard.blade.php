@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 d-flex justify-content-between align-items-center">
        <span>📊 Dashboard - DB Finance App</span>
    </h2>

    <div class="row">
        <!-- Pelanggan -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100"> <!-- h-100 agar tinggi kartu rata -->
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="mt-auto">👤 Pelanggan</h5>
                    <p class="card-text">Kelola data pelanggan yang berutang atau dipiutangi.</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Lihat Daftar</a>
                    <a href="{{ route('customers.create') }}" class="btn btn-success mt-2">➕ Tambah</a>
                </div>
            </div>
        </div>

        <!-- Transaksi -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100"> <!-- h-100 tinggi kartu rata -->
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="mt-auto">💰 Transaksi</h5>
                    <p class="card-text">Catat utang atau piutang baru untuk pelanggan.</p>
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Lihat Transaksi</a>
                    <a href="{{ route('transactions.create') }}" class="btn btn-success mt-2">➕ Tambah</a>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100"> <!-- h-100 tinggi kartu rata -->
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="mt-auto">💳 Pembayaran</h5>
                    <p class="card-text">Input pembayaran utang/piutang pelanggan.</p>
                    <a href="{{ route('payments.index') }}" class="btn btn-primary">Riwayat Pembayaran</a>
                    <a href="{{ route('payments.create') }}" class="btn btn-success mt-2">➕ Tambah Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
