<html>
<head>
    <title>{{ $poster->title }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ $poster->title }}</h1>
    <h5>{{ $poster->published_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! nl2br(e($poster->content)) !!}
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
        « Back
    </button>
</div>
</body>
</html>