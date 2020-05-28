<?php

namespace App\Models;

use App\Models\DeliveryMethod;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class DeliveryData extends Model
{
    protected $fillable = [
        'email', 'address1', 'address2', 'city', 'state', 'zip'
    ];

    protected $rules = array(
        'email' => 'required|email',
        'address1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required'
    );

    public function validate($inputs)
    {
        $v = Validator::make($inputs, $this->rules);
        if ($v->passes()) return true;
        $this->errors = $v->messages();
        return false;
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'delivery_product', 'delivery_id', 'product_id')->withPivot('quantity');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id');
    }
}
