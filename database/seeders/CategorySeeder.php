<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['SUV', 'station wagon', 'coupè', 'minivan', 'cabriolet'];

        foreach ($categories as $category) {

            $new_cat = new Category();

            $new_cat->name = $category;
            $new_cat->slug = Str::slug($new_cat->name, '-');

            $new_cat->save();
        }
    }
}
