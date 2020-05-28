<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function deliveryData()
    {
        return $this->belongsToMany(Product::class, 'delivery_product', 'product_id', 'delivery_id')->withPivot('quantity');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productPicture()
    {
        return $this->hasMany(ProductPicture::class, 'product_id');
    }

    public function productSlider()
    {
        return $this->hasMany(ProductSlider::class);
    }
}
