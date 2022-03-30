<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['itemcategoryid', 'itemname', 'itemdescription', 'brutoprice', 'nettoprice', 'itemquantity', 'itempicture'];

    public function item_categories()
    {
        return $this->belongsTo(ItemCategories::class, 'itemcategoryid');
    }
    public function cart_tables()
    {
        return $this->hasMany(CartTables::class);
    }
    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
