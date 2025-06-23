<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run(): void {
        $categories = ['Motherboards', 'CPUs', 'GPUs', 'RAM', 'Storage'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
