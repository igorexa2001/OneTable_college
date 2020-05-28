<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPicture;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $pictures = ProductPicture::all();
        factory(Product::class, 100)->create()->each(function ($product) use ($categories, $pictures){
            $product->category()->attach($categories->random(1));
        });
    }
}
