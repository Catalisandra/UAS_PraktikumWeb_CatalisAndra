@extends('layouts.app')

@section('content')
<h4>➕ Tambah Transaksi Baru</h4>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="customer_id" class="form-label">Pilih Pelanggan</label>
        <select name="customer_id" id="customer_id" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Jenis Transaksi</label>
        <select name="type" id="type" class="form-select" required>
            <option value="utang">Utang</option>
            <option value="piutang">Piutang</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah</label>
        <input type="number" name="amount" id="amount" class="form-control" required min="0">
    </div>

    <div class="mb-3">
        <label for="due_date" class="form-label">Jatuh Tempo</label>
        <input type="date" name="due_date" id="due_date" class="form-control" required value="{{ now()->addDays(7)->toDateString() }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="belum lunas">Belum Lunas</option>
            <option value="lunas">Lunas</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
 