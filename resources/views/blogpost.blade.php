@extends('layout')

@section('content')
    <form
        @if ($post->exists)
            action="/blog/edit/{{ $post->id}}"
        @else
            action="/blog"
        @endif
        method="POST">

    {{ csrf_field() }}

    <label for="title">Blogposzt címe</label>
    <input type="text" name="title" value="{{ $post->title }}">
    
    <br>

    <label for="intro">Bevezető</label>
    <textarea name="intro" id="intro" rows="4">{{ $post->intro }}</textarea>

    <br>

    <label for="content">Tartalom</label>
    <textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>

    <br>


    <label for="is_published">Publikálás</label>
    <input type="checkbox" id="is_published" name="is_published"
        value="1" 
        @if ($post->is_published) checked @endif
    >
<br>
    <button type="submit">Mentés</button>
    </form>

    <br>
    <a href="{{ route('blog.list') }}">Vissza</a>
@endsection