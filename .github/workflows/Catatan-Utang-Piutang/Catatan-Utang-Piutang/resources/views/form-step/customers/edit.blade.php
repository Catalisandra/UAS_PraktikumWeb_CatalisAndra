@extends('layouts.app')

@section('content')
<h4>✏️ Edit Data Pelanggan</h4>

<form action="{{ route('customers.update', $customer) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $customer->name) }}">
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">No. Telepon</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $customer->address) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
 