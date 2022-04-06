<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockDetail extends Model
{
    use HasFactory;
    protected $fillable = ['restock_id','itemid', 'restockquantity'];
    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid');
    }
    public function restock_header()
    {
        return $this->belongsTo(RestockHeader::class, 'restock_id');
    }
}
