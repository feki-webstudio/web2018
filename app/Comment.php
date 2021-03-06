<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'blog_post_id'];

    protected $visible = [
        'id',
        'content',
        'created_at',
    ];
}
