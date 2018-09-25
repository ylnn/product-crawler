<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'variant_id',
        'product_id',
        'title',
        'option1',
        'option2',
        'option3',
        'sku',
        'requires_shipping',
        'taxable',
        'featured_image',
        'available',
        'price',
        'grams',
        'position'
    ];

    public function product()
    {
        $this->belongsTo(Product::class);   
    }

}
