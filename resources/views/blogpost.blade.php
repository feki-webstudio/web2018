@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form
                    @if ($post->exists)
                    action="/blog/edit/{{ $post->id}}"
                    @else
                    action="/blog"
                    @endif
                    method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Blogposzt címe</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="intro">Bevezető</label>
                        <textarea name="intro" id="intro" class="form-control"
                                  rows="4">{{ $post->intro }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Tartalom</label>
                        <textarea name="content" id="content" cols="30"
                                  class="form-control"
                                  rows="10">{{ $post->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="is_published">Publikálás</label>
                        <input type="checkbox" id="is_published"
                               name="is_published"
                               value="1"
                               @if ($post->is_published) checked @endif
                        >
                    </div>

                    <button class="btn btn-primary" type="submit">Mentés
                    </button>
                </form>

                <br>
                <a class="btn btn-danger"
                   href="{{ route('blog.list') }}">Vissza</a>
            </div>
        </div>
    </div>
@endsection
