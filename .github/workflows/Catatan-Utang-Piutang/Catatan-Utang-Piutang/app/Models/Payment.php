<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'amount', 'payment_date', 'note'];

    // Relasi: Pembayaran milik 1 Transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
