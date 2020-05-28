<?php

use App\Models\Article;
use App\Models\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(DeliveryMethod::class, 4)->create();
    }
}
