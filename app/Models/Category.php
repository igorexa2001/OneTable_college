<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function categories() //вызов следующего уровня https://laravel.demiart.ru/recursive-hasmany-relationship-with-unlimited-subcategories/
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories() //вызов всех подкатегорий
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
}
