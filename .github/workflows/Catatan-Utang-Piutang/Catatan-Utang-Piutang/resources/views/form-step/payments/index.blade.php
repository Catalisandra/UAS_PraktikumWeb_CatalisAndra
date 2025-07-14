@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h4 class="mb-2">💳 Riwayat Pembayaran</h4>
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('payments.create') }}" class="btn btn-success">+ Tambah Pembayaran</a>

        {{-- Tombol kembali ke Dashboard --}}
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            ← Kembali ke Dashboard
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
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->transaction->customer->name ?? '-' }}</td>
                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}</td>
<td>
    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-sm btn-primary">Edit</a>

    {{-- Tombol Riwayat/Detail --}}
    <a href="{{ route('payments.show', $payment) }}" class="btn btn-sm btn-info">Riwayat</a>

    <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">Hapus</button>
    </form>
</td>

            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada pembayaran.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
