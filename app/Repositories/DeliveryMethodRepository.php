<?php

namespace App\Repositories;

use App\Models\DeliveryMethod;


class DeliveryMethodRepository
{
    /**
     * @return DeliveryMethod[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return DeliveryMethod::all();
    }

    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title)
    {
        return DeliveryMethod::where('title', $title)->first();
    }
}
