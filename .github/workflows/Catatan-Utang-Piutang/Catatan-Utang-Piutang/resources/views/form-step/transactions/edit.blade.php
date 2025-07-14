@extends('layouts.app')

@section('content')
<h4>✏️ Edit Transaksi</h4>

<form action="{{ route('transactions.update', $transaction) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="type" class="form-label">Jenis Transaksi</label>
        <select name="type" id="type" class="form-select" required>
            <option value="utang" {{ $transaction->type == 'utang' ? 'selected' : '' }}>Utang</option>
            <option value="piutang" {{ $transaction->type == 'piutang' ? 'selected' : '' }}>Piutang</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Jumlah</label>
        <input type="number" name="amount" id="amount" class="form-control" required min="0" value="{{ old('amount', $transaction->amount) }}">
    </div>

    <div class="mb-3">
        <label for="due_date" class="form-label">Jatuh Tempo</label>
        <input type="date" name="due_date" id="due_date" class="form-control" required value="{{ old('due_date', $transaction->due_date) }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="belum lunas" {{ $transaction->status == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
            <option value="lunas" {{ $transaction->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
 