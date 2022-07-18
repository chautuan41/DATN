<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'product_name',
        'description',
        'price',
        'gender',
        'discount',
        'like',
        'image',
        'categories',
        'product_type',
        'supplier',
        'brand',
        'status',
    ];
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
}
