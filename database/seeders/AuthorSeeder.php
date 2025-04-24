<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::insert([
            ['name' => 'Ahmed Nabil', 'bio' => 'Writer and researcher.', 'birth_date' => '1980-01-01', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sara Youssef', 'bio' => 'Expert in modern literature.', 'birth_date' => '1985-05-12', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
