<h1>{{ $post->title }}</h1>
<span>{{ $post->created_at->format('Y. m. d. H:i') }}</span>
<div>
    {{ $post->intro }}
</div>
<div>
    {{ $post->content }}
</div>