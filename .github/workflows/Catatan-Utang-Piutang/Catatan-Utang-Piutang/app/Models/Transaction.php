<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'type', 'amount', 'due_date', 'status'];

    // Relasi: Transaksi milik 1 Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi: Transaksi punya banyak Pembayaran
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
