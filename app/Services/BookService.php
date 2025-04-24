<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('dashboard.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('dashboard.book.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $imagePath =  uploadFile($request->file('cover_image'), "covers"); // public disk by default
        $pathFile  =  uploadFile($request->file('path_file'), "files"); // public disk by default

        // create book 
        $book = Book::create([
            'author_id'        => $request->author_id,
            'title'            => $request->title,
            'description'      => $request->description,
            'publication_year' => $request->publication_year,
            'cover_image'      => $imagePath,
            'available_copies' => $request->available_copies,
            'path_file'        => $pathFile,
        ]);

        // ربط التصنيفات (many-to-many)
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with("success", "Add Book Sucessfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('dashboard.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('dashboard.book.edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $imagePath = $book->cover_image;
        if ($request->file('cover_image'))
            $imagePath = uploadFile($request->file('cover_image'), "covers"); // public disk by default

        $pathFile  = $book->path_file;
        if ($request->file('path_file'))
            $pathFile  = uploadFile($request->file('path_file'), "files"); // public disk by default

        $book->update([
            'author_id'        => $request->author_id,
            'title'            => $request->title,
            'description'      => $request->description,
            'publication_year' => $request->publication_year,
            'cover_image'      => $imagePath,
            'available_copies' => $request->available_copies,
            'path_file'        => $pathFile,
        ]);

        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with("success", "Edit Book Sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with("success", "delete Book Sucessfully");
    }

    public function getTrashedBooks($x=5){
        return  Book::onlyTrashed()->paginate($x);
    }

    public function restoreBook($id){
        $book = Book::onlyTrashed()->where('id', $id)->first();
        $book->restore();
    }

    public function deleteBook($id){
        $book = Book::onlyTrashed()->where('id', $id)->first();
        $book->forceDelete();
    }
}
