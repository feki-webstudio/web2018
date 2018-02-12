<html>
<head>
<title>Blog</title>
</head>
<body>

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
<label for="content">Tartalom</label>
<textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>

<br>

<button type="submit">Mentés</button>
</form>
</body>
</html>