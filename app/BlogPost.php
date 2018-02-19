<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'content', 'intro', 'is_published'];

    protected $table = 'blog_posts';

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }
}
