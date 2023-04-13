<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'Transactions';
    protected $primarykey = 'id';
    protected $fillable = [
        "product_id",
        "qty"
    ];

    public function transactions(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
