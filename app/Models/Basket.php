<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $fillable=['mony','element_count','profile_id','name'];
    protected $table='baskets';

    /**
     * Get the user that owns the Basket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'baskets_products');
    }
}
