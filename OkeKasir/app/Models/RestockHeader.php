<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockHeader extends Model
{
    use HasFactory;
    protected $fillable = ['staffname', 'userid', 'status'];
    public function restock_detail(){
        return $this->hasMany(RestockDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }
}
