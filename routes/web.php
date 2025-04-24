<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);

Route::controller(BookController::class)->group(function(){
    
    Route::get('books/trashed','trashed')->name('books.trashed');
    Route::put('books/restore/{id}','restore')->name('books.restore');
    Route::delete('books/forceDelete/{id}','forceDelete')->name('books.forceDelete');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('categories/trashed','trashed')->name('categories.trashed');
    Route::put('categories/restore/{id}','restore')->name('categories.restore');
    Route::delete('categories/forceDelete/{id}','forceDelete')->name('categories.forceDelete');
});


Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
