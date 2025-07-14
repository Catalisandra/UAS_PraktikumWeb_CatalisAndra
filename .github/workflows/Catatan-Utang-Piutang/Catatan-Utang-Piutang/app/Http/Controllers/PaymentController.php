<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('transaction.customer')->latest()->get();
        return view('form-step.payments.index', compact('payments'));
    }

    public function create()
    {
        $transactions = Transaction::where('status', 'belum_lunas')->get();
        return view('form-step.payments.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pembayaran dihapus.');
    }

    public function show(Payment $payment)
    {
    return view('form-step.payments.show', compact('payment'));
    }

}
 