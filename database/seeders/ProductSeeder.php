<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run(): void {
        Product::create([
            'name' => 'Intel Core i7 11800H',
            'description' => 'High performance desktop processor',
            'price' => 349.99,
            'quantity' => 10,
            'category_id' => 2,
            'image' => null
        ]);

        Product::create([
            'name' => 'NVIDIA RTX 3060',
            'description' => 'Powerful graphics card for gaming and rendering',
            'price' => 699.99,
            'quantity' => 5,
            'category_id' => 3,
            'image' => null
        ]);
    }
}
