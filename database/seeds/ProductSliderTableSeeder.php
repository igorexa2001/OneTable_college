<?php

use App\Models\Article;
use App\Models\ProductPicture;
use Illuminate\Database\Seeder;

class ProductSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = factory(\App\Models\Product::class, 1)->create();
        $product = $product->first();
        $product->category()->attach(\App\Models\Category::all()->random(1)->first());
        $product->freshTimestamp();
        $picture = new ProductPicture();
        $picture->path_to_image = "images/products/product_1.png";
        $picture->product_id = $product->id;
        $picture->freshTimestamp();
        $picture->save();
        $slider = new \App\Models\ProductSlider();
        $slider->product_id = $product->id;
        $slider->save();
    }
}
