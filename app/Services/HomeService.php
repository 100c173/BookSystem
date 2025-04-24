<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Carbon\Carbon;

class HomeService
{

    public function homePage(&$books, &$categories, &$authors, &$recentBooks)
    {
        $books = Book::count();
        $categories = Category::count();
        $authors = Author::count();
        $recentBooks =$recentBooks = Book::recent(5)->get();
    }
}
