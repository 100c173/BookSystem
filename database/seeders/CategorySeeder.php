<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::insert([
            ['name' => 'Technology', 'description' => 'Books about tech and IT.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'History', 'description' => 'Historical analysis and research.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Science', 'description' => 'Scientific discoveries and theories.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
