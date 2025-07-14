<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('customer')->latest()->get();
        return view('form-step.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('form-step.transactions.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:utang,piutang',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'nullable|date',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Transaction $transaction)
    {
        $customers = Customer::all();
        return view('form-step.transactions.edit', compact('transaction', 'customers'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:utang,piutang',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'nullable|date',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi dihapus.');
    }
}
