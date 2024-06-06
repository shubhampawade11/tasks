<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\RatingSeeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            RatingSeeder::class,
           
        ]);
    }
}
