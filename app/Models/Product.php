<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id'
    ];

    public function category() 
    {
       return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
