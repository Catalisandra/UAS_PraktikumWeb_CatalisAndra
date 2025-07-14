<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'address', 'user_id'];

    // Relasi: Customer milik 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Customer punya banyak Transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // ✅ Relasi: Customer punya banyak Pembayaran
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
