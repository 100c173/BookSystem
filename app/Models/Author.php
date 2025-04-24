<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'birth_date',
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

    // Defining the boot method to handle the deletion of related books
    protected static function boot()
    {
        parent::boot();

        // Hooking into the 'deleting' event
        static::deleting(function ($author) {
            // Delete all books associated with the author when the author is deleted
            $author->books()->delete();
        });
    }
}
