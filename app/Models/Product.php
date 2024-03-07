<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'qty',
        'photo',
        'brand',
        'production_date'
    ];

    function get_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
