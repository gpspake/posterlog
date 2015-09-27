<html>
<head>
    <title>{{ config('site.title') }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ config('site.title') }}</h1>
    <h5>Page {{ $posters->currentPage() }} of {{ $posters->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($posters as $poster)
            <li>
                <a href="/{{ $poster->slug }}">{{ $poster->title }}</a>
                <em>({{ $poster->published_at->format('M jS Y g:ia') }})</em>
                <p>
                    {{ str_limit($poster->description) }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $posters->render() !!}
</div>
</body>
</html>