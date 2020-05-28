<?php

namespace App\Repositories;

use App\Models\Brand;


class BrandRepository
{
    /**
     * @return Brand[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return Brand::all();
    }

    /**
     * Нахождение для слайдера
     *
     * @return Brand[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findToSlider()
    {
        return Brand::where('is_in_slider', 1)->get();
    }

    public function findProducts($brand)
    {

    }

}
