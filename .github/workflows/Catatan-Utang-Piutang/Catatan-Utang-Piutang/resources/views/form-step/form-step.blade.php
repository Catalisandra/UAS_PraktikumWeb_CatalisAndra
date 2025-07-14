@extends('layouts.app')

@section('content')
<h4 class="mb-4">📝 Input Data Bertahap</h4>

{{-- STEP NAVIGATION --}}
<ul class="nav nav-pills mb-4 justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('form-step/customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">1️⃣ Pelanggan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('form-step/transactions*') ? 'active' : '' }}" href="{{ route('transactions.index') }}">2️⃣ Transaksi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('form-step/payments*') ? 'active' : '' }}" href="{{ route('payments.index') }}">3️⃣ Pembayaran</a>
    </li>
</ul>

{{-- DYNAMIC CONTENT FROM CHILD --}}
<div class="card">
    <div class="card-body">
        @yield('step-content')
    </div>
</div>
@endsection
