<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('site.title') }} Admin</title>
    <script src="/assets/js/modernizr.js"></script>
    <link href="/assets/css/admin.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

<div class="row">
    <div class="large-5 large-offset-1 columns">
        <h1><strong>Poster</strong>Log</h1>
    </div>

    <div class="large-5 columns">
        <br>

        <form>
            <div class="row collapse postfix-radius">
                <div class="small-9 columns">
                    <input type="text" placeholder="Search">
                </div>
                <div class="small-3 columns">
                    <span class="postfix">Search</span>
                </div>
            </div>
        </form>
    </div>
    <div class="large-1 columns"></div>
</div>

<div class="row collapse ">
    <div class="large-1 columns">
        <ul class="side-nav" role="navigation" title="Link List">
            <li role="menuitem">
                <a href="#" data-reveal-id="about">About</a>

                <div id="about" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle"
                     aria-hidden="true" role="dialog">
                    <h2 id="modalTitle">About</h2>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
            </li>

            <li role="menuitem">
                <a href="#" data-reveal-id="artistSelect">Tags</a>

                <div id="artistSelect" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle"
                     aria-hidden="true" role="dialog">
                    <h2 id="modalTitle">Filter by Artist</h2>

                    <form>
                        <div class="row">
                            <div class="large-3 medium-6 columns">
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                            </div>
                            <div class="large-3 medium-6 columns">
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                            </div>
                            <div class="large-3 medium-6 columns">
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                            </div>
                            <div class="large-3 medium-6 columns">
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label><br>
                                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <a href="#" class="button expand">Expanded Button</a>
                            </div>

                        </div>
                    </form>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
            </li>

            <li><a href="/admin">Admin</a></li>

        </ul>
    </div>
    <div class="small-10 small-offset-1 large-offset-0 columns">
        <div class="grid">
            @foreach ($posters as $poster)
                <div class="grid-item">
                    <a href="#" data-reveal-id="{{ $poster->slug }}">
                        <img src="{{ $poster->image }}?w=300">
                    </a>
                </div>
                <div id="{{ $poster->slug }}" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle"
                     aria-hidden="true" role="dialog">

                    <div class="row">
                        <div class="large-8 columns">
                            <a href="{{ $poster->image }}"><img src="{{ $poster->image }}?w=500"/></a>
                        </div>
                        <div class="large-4 columns">
                            <p><strong>{{ $poster->title }}</strong><br>
                                Storefront<br>
                                {{ $poster->dimensions }}</p>

                            <div class="tags">
                                <p><strong>Tags</strong></p>
                                <a href="#" class="button tiny">Gillian Welch</a>
                            </div>
                        </div>
                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>

                    </div>
                </div>
            @endforeach
            {!! $posters->render() !!}
        </div>
    </div>
    <div class="large-1 columns"></div>
</div>

@yield('content')

<script src="/assets/js/admin.js"></script>

@yield('scripts')
<script>
    $(document).foundation();
    $(document).ready(function () {
        var $grid = $('.grid');
        $grid.imagesLoaded(function () {
            // init Masonry after all images have loaded
            $grid.masonry({
                itemSelector: '.grid-item'
            });

            $(".grid-item img").addClass( "masonry-grid-image" );
        });
    });
</script>

</body>
</html>