<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'content', 'intro', 'is_published'];

    protected $table = 'blog_posts';

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }
}
