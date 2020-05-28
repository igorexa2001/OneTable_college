<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    public function brandSlider()
    {
        return $this->belongsTo(BrandSlider::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
