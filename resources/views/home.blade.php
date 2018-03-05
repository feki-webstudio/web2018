@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a class="btn btn-primary" href="{{ route('blog.create') }}">Új poszt</a>
    </div>

    <br>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-lg-4">
                {{--@include('blogpost_content', ['post' => $post])--}}

                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <span>{{ $post->created_at->format('Y. m. d. H:i') }}</span>
                        <p class="card-text">{{$post->intro}}</p>
                        <a class="btn btn-primary w-100 mb-3" href="{{ route('blog.edit', ['id' => $post->id]) }}">
                            Szerkesztés
                        </a>
                        <form
                            action="{{ route('blog.delete', ['id' => $post->id]) }}"
                            method="POST"
                        >
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button class="btn btn-primary w-100" type="submit">Poszt törlése</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>
@endsection
