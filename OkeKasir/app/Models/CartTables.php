<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartTables extends Model
{
    use HasFactory;
    protected $fillable = ['itemid', 'customername', 'quantity'];
    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid');
    }
}
