<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_id', 'itemid', 'transactionquantity'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid');
    }

    public function transaction_header()
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id');
    }
}
