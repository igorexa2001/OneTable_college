<?php

use App\Models\Article;
use App\Models\ProductPicture;
use Illuminate\Database\Seeder;

class ProductPictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductPicture::class, 150)->create();
    }
}
