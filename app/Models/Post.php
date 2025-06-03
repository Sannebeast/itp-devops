<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];

    /**
     * Derived attribute for the count of comments
     *
     * @return Attribute
     */
    public function commentCount() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->comments()->count()
        );
    }

    /**
     * a Post has many Comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
