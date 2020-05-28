<?php

namespace App\Repositories;

use App\Models\ProductSlider;


class ProductSliderRepository
{
    /**
     * @return ProductSlider[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return ProductSlider::all();
    }

}
