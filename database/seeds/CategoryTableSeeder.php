<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 9)->create();
        //$category = Category::all()->random(1)->where('id', '>', '1' );
        //$category->category_id = random_int(0, $category->id - 1);
    }
}
