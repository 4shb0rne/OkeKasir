<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'customername', 'staffname', 'status'];
    public function transaction_details(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }
}
