<?php

namespace App\Repositories;

use App\Models\Subscriber;


class SubscriberRepository
{
    public function findAll()
    {
        return Subscriber::all();
    }
}
