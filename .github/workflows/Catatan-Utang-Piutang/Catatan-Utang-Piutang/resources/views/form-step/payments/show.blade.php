@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>🔍 Detail Pembayaran</h4>
    <table class="table table-bordered mt-3">
        <tr>
            <th>Pelanggan</th>
            <td>{{ $payment->transaction->customer->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tanggal Pembayaran</th>
            <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $payment->note ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('payments.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
</div>
@endsection
 