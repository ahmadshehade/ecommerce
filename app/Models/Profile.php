<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=['name','user_id','age','country','gender','photo','number'];
    protected $table="profiles";
    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user associated with the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function basket()
    {
        return $this->hasOne(Basket::class);
    }
}
