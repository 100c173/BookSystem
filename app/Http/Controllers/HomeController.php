<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Services\HomeService ;


class HomeController extends Controller
{
    protected $homeService ; 
   
    public function __construct(HomeService $homeService){

        $this->homeService = $homeService;
    }

    public function index () {
        
        $books =  $categories = $authors = 0;
        $recentBooks = [];

        $data =   $this->homeService->homePage( $books ,$categories ,$authors, $recentBooks );

        return view('dashboard.index',compact('books','categories','authors','recentBooks'));
    }
}