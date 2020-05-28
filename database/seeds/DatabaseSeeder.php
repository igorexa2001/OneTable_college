<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        $this->call(ArticleTableSeeder::class);

        $this->call(DeliveryMethodTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductPictureTableSeeder::class);

        $this->call(VoyagerDatabaseSeeder::class);

        $this->call(ProductSliderTableSeeder::class);
//        $this->call(BrandSliderTableSeeder::class);
    }
}
