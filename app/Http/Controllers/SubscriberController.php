<?php

namespace App\Http\Controllers;

use App\Factories\SubscriberFactory;
use App\Repositories\SubscriberRepository;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    private $subscriberRepository;
    private $subscriberFactory;

    public function __construct(
        SubscriberRepository $subscriberRepository,
        SubscriberFactory $subscriberFactory
    )
    {
        $this->subscriberRepository = $subscriberRepository;
        $this->subscriberFactory = $subscriberFactory;
    }

    public function store(Request $request)
    {
        $subscriber = $this->subscriberFactory->create();
        $subscriber->fill($request->all());
        $subscriber->save();

        return redirect()->back();
    }
}
