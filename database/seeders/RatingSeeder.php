<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
   
    public function run(): void
    {
        Rating::create([
            'product_id' => 1,
            'rate' => 3.9,
            'count' => 120,
        ]);
    }
}
