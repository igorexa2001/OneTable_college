<?php

namespace App\Repositories;

use App\Models\DeliveryData;


class DeliveryDataRepository
{

    public function findAll()
    {
        return DeliveryData::all();
    }

    public function findById($id)
    {
        return DeliveryData::where('id', $id)->first();
    }
}
