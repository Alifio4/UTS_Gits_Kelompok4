<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'Carts';
    protected $primarykey = 'id';
    protected $fillable = [
        "product_id",
        "qty"
    ];

    public function cart(){
        return $this->belongsTo(Product::class, 'product_id'); //menunggu tabel produk
    }
}
