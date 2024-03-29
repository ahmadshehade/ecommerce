<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','price','description','image','amount'];
    protected $table='products';

    public function baskets(){
        return $this->belongsToMany(Basket::class,'baskets_products');
    }

}
