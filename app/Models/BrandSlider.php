<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSlider extends Model
{
    public $timestamps = false;

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }
}
