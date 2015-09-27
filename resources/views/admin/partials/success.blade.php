@if (Session::has('success'))
    <div data-alert class="alert-box success radius">
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
        </strong>
        {{ Session::get('success') }}
        <a href="#" class="close">&times;</a>
    </div>
@endif