<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب المؤلفين والتصنيفات لإنشاء الكتب وربطها
        $authorIds = Author::pluck('id');
        $categoryIds = Category::pluck('id');
        // إنشاء كتب وربطها بتصنيفات
        foreach (range(1, 5) as $i) {
            $book = Book::create([
                'author_id' => $authorIds->random(),
                'title' => "Sample Book $i",
                'description' => "Description for book $i",
                'publication_year' => 2000 + $i,
                'pages' => 100 + ($i * 10),
                'cover_image' => null,
                'available_copies' => rand(1, 10),
                'path_file' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // ربط الكتاب بتصنيفين عشوائيين
            $book->categories()->attach($categoryIds->random(2));
        }
    }
}
