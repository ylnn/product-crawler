<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['src', 'width', 'height'];

    public function product()
    {
        $this->belongsTo(Product::class);   
    }
}
