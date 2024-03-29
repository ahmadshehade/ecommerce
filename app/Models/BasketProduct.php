<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;
    protected $fillable=['basket_id','basket_name','product_name','product_id'];
    protected $table='baskets_products';
}
