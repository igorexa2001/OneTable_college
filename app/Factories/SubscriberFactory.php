<?php
namespace App\Factories;

use App\Models\Subscriber;

class SubscriberFactory
{
    /**
     * @return Subscriber
     */
    public function create()
    {
        return new Subscriber();
    }
}
