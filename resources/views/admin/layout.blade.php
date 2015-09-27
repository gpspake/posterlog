<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }} Admin</title>

    <link href="/assets/css/admin.css" rel="stylesheet">
    @yield('styles')
</head>
<body>


<div class="contain-to-grid">
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="/">PosterLog</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    @include('admin.partials.navbar')
</nav>
</div>

@yield('content')

<script src="/assets/js/admin.js"></script>

@yield('scripts')

</body>
</html>