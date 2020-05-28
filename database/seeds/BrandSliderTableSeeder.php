<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class BrandSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BrandSlider::class, 3)->create();
    }
}
