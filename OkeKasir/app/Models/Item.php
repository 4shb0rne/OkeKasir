<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'itemcategoryid', 'itemname', 'itemdescription', 'brutoprice', 'nettoprice', 'itemquantity', 'itempicture'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    public function item_categories()
    {
        return $this->belongsTo(ItemCategories::class, 'itemcategoryid');
    }
    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
