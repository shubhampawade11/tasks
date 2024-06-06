<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
   
    public function run(): void
    {
        Product::create([
            'title' => 'Fjallraven - Foldsack No. 1 Backpack',
            'price' => 109.95,
            'description' => 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday',
            'category' => "men's clothing",
            'image' => 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg',
        ]);
    }
}
