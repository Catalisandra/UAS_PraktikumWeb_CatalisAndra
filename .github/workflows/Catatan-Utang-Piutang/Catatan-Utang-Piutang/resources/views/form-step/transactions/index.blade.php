@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h4 class="mb-2">💰 Daftar Transaksi</h4>
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('transactions.create') }}" class="btn btn-success">+ Tambah Transaksi</a>

        {{-- Tombol ke pembayaran --}}
        <a href="{{ route('payments.index') }}" class="btn btn-primary">
            Selanjutnya → Pembayaran
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->customer->name }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                <td>{{ $transaction->due_date }}</td>
                <td>{{ ucfirst($transaction->status) }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Belum ada transaksi.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
