@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h4 class="mb-2">📋 Daftar Pelanggan</h4>
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('customers.create') }}" class="btn btn-success">+ Tambah Pelanggan</a>
    
        
        {{-- Tombol Selanjutnya di bawah tabel, kanan --}}
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">
        Selanjutnya → Transaksi
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
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data pelanggan.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
