@extends('layout')

@section('content')
    <div>
    <a href="{{ route('blog.create') }}">Új poszt</a>
    </div>
    
    <br>

    @foreach($posts as $post)
        @include('blogpost_content', ['post' => $post])
        <a href="{{ route('blog.edit', ['id' => $post->id]) }}">Szerkesztés</a>

        <form action="{{ route('blog.delete', ['id' => $post->id]) }}"
                method="POST"
        >
        {{ method_field('delete') }}
        {{ csrf_field() }}
            <button type="submit">Poszt törlése</button>
        </form>
        <hr>
    @endforeach

    {{ $posts->links() }}
@endsection