<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Comment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost
            ::latest()
            ->published()
            ->paginate(10);

        return view('blogpost_list', ['posts' => $posts]);
    }

    public function create()
    {
        return view ('blogpost', ['post' => new BlogPost(['is_published' => true])]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:blog_posts|max:255',
            'intro' => 'required',
        ]);

        $post = new BlogPost($request->all());

        $post->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('blogpost', ['post' => $post]);
    }

    public function update($id, Request $request)
    {
        $post = BlogPost::findOrFail($id);
        $post->fill($request->all());
        $post->save();

        return redirect('/blog');
    }

    public function delete($id)
    {
        BlogPost::destroy($id);

        return redirect('/blog');
    }

    public function storeComment(Request $request){
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment($request->all());

        $comment->save();

        return redirect('/');
    }
}
