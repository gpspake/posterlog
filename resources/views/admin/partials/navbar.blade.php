<section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
        @if (Auth::guest())
            <li><a href="/auth/login">Login</a></li>
        @else
            <li class="has-dropdown">
                <a href="#">{{ Auth::user()->name }}</a>
                <ul class="dropdown">
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </li>
        @endif
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
        @if (Auth::check())
            <li @if (Request::is('admin/poster*')) class="active" @endif>
                <a href="/admin/post">Posters</a>
            </li>
            <li @if (Request::is('admin/tag*')) class="active" @endif>
                <a href="/admin/tag">Tags</a>
            </li>
            <li @if (Request::is('admin/upload*')) class="active" @endif>
                <a href="/admin/upload">Uploads</a>
            </li>
        @endif
    </ul>
</section>