@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>📚 Riwayat Pelanggan: {{ $customer->name }}</h2>

    <h4 class="mt-4">💰 Transaksi</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer->transactions as $t)
            <tr>
                <td>{{ ucfirst($t->type) }}</td>
                <td>Rp{{ number_format($t->amount, 0, ',', '.') }}</td>
                <td>{{ $t->due_date }}</td>
                <td>{{ $t->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4">💳 Pembayaran</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Bayar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer->payments as $p)
            <tr>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td>Rp{{ number_format($p->amount, 0, ',', '.') }}</td>
                <td>{{ $p->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
 