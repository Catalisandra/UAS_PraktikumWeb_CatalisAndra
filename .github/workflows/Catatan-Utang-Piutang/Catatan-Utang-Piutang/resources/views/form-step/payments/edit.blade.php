@extends('layouts.app')

@section('content')
<h4>✏️ Edit Pembayaran</h4>

<form action="{{ route('payments.update', $payment) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah Pembayaran</label>
        <input type="number" name="amount" id="amount" class="form-control" required min="0" value="{{ old('amount', $payment->amount) }}">
    </div>

    <div class="mb-3">
        <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
        <input type="date" name="payment_date" id="payment_date" class="form-control" required value="{{ old('payment_date', $payment->payment_date) }}">
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Catatan</label>
        <textarea name="note" id="note" class="form-control" rows="2">{{ old('note', $payment->note) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
 