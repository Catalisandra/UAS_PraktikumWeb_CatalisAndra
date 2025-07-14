<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalCustomers' => Customer::count(),
            'totalTransactions' => Transaction::count(),
            'totalPayments' => Payment::sum('amount'),
        ]);
    }
}
 