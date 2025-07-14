@extends('layouts.app')

@section('content')
<h4>➕ Tambah Pembayaran</h4>

<form action="{{ route('payments.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="transaction_id" class="form-label">Pilih Transaksi</label>
        <select name="transaction_id" id="transaction_id" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach($transactions as $tx)
                <option value="{{ $tx->id }}">
                    [{{ $tx->type }}] {{ $tx->customer->name ?? '-' }} - Rp {{ number_format($tx->amount, 0, ',', '.') }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah Pembayaran</label>
        <input type="number" name="amount" id="amount" class="form-control" required min="0">
    </div>

    <div class="mb-3">
        <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
        <input type="date" name="payment_date" id="payment_date" class="form-control" required value="{{ now()->toDateString() }}">
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Catatan (opsional)</label>
        <textarea name="note" id="note" class="form-control" rows="2"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
 