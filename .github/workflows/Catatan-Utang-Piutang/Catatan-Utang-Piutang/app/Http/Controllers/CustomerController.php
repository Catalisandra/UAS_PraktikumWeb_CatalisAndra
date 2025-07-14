<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->get();
        return view('form-step.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('form-step.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Customer $customer)
    {
        return view('form-step.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($request->only('name', 'phone', 'address'));

        return redirect()->route('customers.index')->with('success', 'Pelanggan diperbarui.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Pelanggan dihapus.');
    }
}
