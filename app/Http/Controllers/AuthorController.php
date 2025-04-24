<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(5);
        return view('dashboard.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('authors.index')->with("success", "Add Author Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $books = $author->books();
        return view('dashboard.author.show',compact('author','books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('dashboard.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return redirect()->route('authors.index')->with("success", "Author edited Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with("success", "Author deleted Successfully");

    }
}
