<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'publication_year',
        'pages',
        'cover_image',
        'available_copies',
        'path_file',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Local Scope: recent 
    public function scopeRecent(Builder $query, $days = 7): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays($days))
            ->latest();
    }
    public function scopeFilterTitle($query, $title)
    {
        return $query->when(
            $title,
            fn($q) =>
            $q->where('title', 'like', '%' . $title . '%')
        );
    }

    public function scopeFilterPublicationYear($query, $year)
    {
        return $query->when(
            $year,
            fn($q) =>
            $q->where('publication_year', $year)
        );
    }

    public function scopeFilterCategory($query, $categoryId)
    {
        return $query->when(
            $categoryId,
            fn($q) =>
            $q->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            })
        );
    }
}
