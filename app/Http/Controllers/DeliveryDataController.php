<?php

namespace App\Http\Controllers;

use App\Models\DeliveryData;
use App\Repositories\DeliveryDataRepository;
use http\Env\Request;

class DeliveryDataController extends Controller
{

    private $deliveryDataRepository;

    public function __construct(
        DeliveryDataRepository $deliveryDataRepository
    )
    {
        $this->deliveryDataRepository = $deliveryDataRepository;
    }

    public function index()
    {
        return view('admin.home_page.index', [
            'deliveryData' => $this->deliveryDataRepository->findAll(),
            'title' => 'Данные о доставках',
        ]);
    }

    public function show($deliveryData)
    {
        return view('admin.delivery.show', [
            'delivery' => $this->deliveryDataRepository->findById($deliveryData),
            'title' => 'Доставка № '.$deliveryData,
        ]);
    }

    public function update($deliveryData, Request $request)
    {
        $model = $this->deliveryDataRepository->findById($deliveryData);
        $model->fill($request);
        $model->save();

        return redirect()->back();
    }

    public function delete($deliveryData)
    {
        $model = $this->deliveryDataRepository->findById($deliveryData);
        $model->product()->detach();
        $model->delete();

        return redirect()->route('admin_index');
    }
}
