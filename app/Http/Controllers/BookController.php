<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::query()
            ->filterTitle($request->get('title'))
            ->filterPublicationYear($request->get('publication_year'))
            ->filterCategory($request->get('category'))
            ->paginate(10);
    
        $categories = Category::all();
    
        return view('dashboard.book.index', compact('books', 'categories'));
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
        $this->bookService->store($request);
        return redirect()->route('books.index')->with("success", "Add Book Successfully");
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
        $this->bookService->update($request, $book);
        return redirect()->route('books.index')->with("success", "Edit Book Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->bookService->destroy($book);
        return redirect()->route('books.index')->with("success", "Delete Book Successfully");
    }

    /**
     * Display a list of soft-deleted books.
     *
     * @return \Illuminate\View\View
     */
    public function trashed()
    {
        $books = $this->bookService->getTrashedBooks();
        return view('dashboard.book.trashed', compact('books')); 
    }

    /**
     * Restore a soft-deleted book by its ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $this->bookService->restoreBook($id);
        return redirect()->route('books.trashed') 
            ->with("success", "Book restored successfully.");
    }

    /**
     * Permanently delete a soft-deleted book by its ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        $this->bookService->deleteBook($id);
        return redirect()->route('books.trashed') 
            ->with("success", "Book permanently deleted.");
    }
}
