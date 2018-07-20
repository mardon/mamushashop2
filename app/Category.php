<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The mass assignable attributes
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get products in category
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
