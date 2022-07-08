<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'link',
        'product',
        'status',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
