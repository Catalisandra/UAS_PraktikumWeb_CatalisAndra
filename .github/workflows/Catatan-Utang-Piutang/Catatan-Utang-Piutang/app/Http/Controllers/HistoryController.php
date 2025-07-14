<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function show($id)
    {
        $customer = Customer::with(['transactions', 'payments'])->findOrFail($id);

        return view('form-step.customers.history', compact('customer'));
    }
}
 