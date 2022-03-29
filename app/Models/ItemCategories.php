<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    use HasFactory;
    protected $fillable = ['itemcategoryname']; 
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}