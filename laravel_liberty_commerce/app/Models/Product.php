<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'stock',
        'price',
        'category',
        'image',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_products');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_has_products');
    }

    public $timestamps = false;
}
