<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', "category_id", 'body'];
    protected $with = ["author", "category"];
    

    public function scopeFilter($query) 
    {
        if ($keyword = request('keyword')) {
            $query->where('title', 'like', "%" . $keyword . "%")
                  ->orWhereHas('author', function ($query) use ($keyword) {
                      $query->where('name', 'like', "%" . $keyword . "%");
                  })
                  ->orWhereHas('category', function ($query) use ($keyword) {
                      $query->where('name', 'like', "%" . $keyword . "%");
                  });
        }
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

 
} 