<html>
<head>
<title>Blog</title>
</head>
<body>
@foreach($posts as $post)
    <h1>{{ $post->title }}</h1>
    <div>
        {{ $post->content }}
    </div>
    <hr>
@endforeach
</body>
</html>