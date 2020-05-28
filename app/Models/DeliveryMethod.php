<?php

namespace App\Models;

use App\DeliveryData;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    public $timestamps = false;

    public function deliveryData()
    {
        return $this->hasMany(DeliveryData::class);
    }
}
