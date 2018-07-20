<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name',
        'slug',
        'description',
        'price',
        'visible',
        'quantity'
    ];

    /**
     * Get category for product
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
