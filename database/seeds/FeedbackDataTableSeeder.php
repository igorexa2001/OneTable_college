<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\FeedbackData;

class FeedbackDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FeedbackData::class, 9)->create();
    }
}
