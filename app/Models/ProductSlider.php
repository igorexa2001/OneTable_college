<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    public $timestamps = false;
    public $table = 'product_slider';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
