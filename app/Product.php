<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'handle',
        'body_html',
        'vendor',
        'product_type',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class); 
    }
}
