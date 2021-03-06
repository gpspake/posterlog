@extends('admin.layout')

@section('content')
    <br>
    <div class="row">
        <div class="medium-6 columns">
            <h3>Poster <small>» Listing</small></h3>
        </div>
        <div class="medium-6 columns">
            <a href="/admin/poster/create" class="button tiny right">
                <i class="fa fa-plus-circle"></i> New Poster
            </a>
        </div>
    </div>
    <div class="row">
        <div class="columns">

            @include('admin.partials.errors')
            @include('admin.partials.success')

            <table id="posters-table" class="full-width-table">
                <thead>
                <tr>
                    <th width="100">Preview</th>
                    <th>Published</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th data-sortable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posters as $poster)
                    <tr>
                        <td data-order="{{ $poster->published_at->timestamp }}">
                            <img src="{{ url($poster->image) }}?w=200&h=200&fit=crop" />
                        </td>
                        <td data-order="{{ $poster->published_at->timestamp }}">
                            {{ $poster->published_at->format('j-M-y g:ia') }}
                        </td>
                        <td>{{ $poster->title }}</td>
                        <td>{{ $poster->slug }}</td>
                        <td width="250">
                            <a href="/admin/poster/{{ $poster->id }}/edit"
                               class="button tiny">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="/poster/{{ $poster->slug }}"
                               class="button tiny success">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a href="#" data-reveal-id="modal-delete" data-poster-id="{{ $poster->id }}"
                               class="button tiny alert modal-delete">
                                <i class="fa fa-times-circle"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- Confirm Delete --}}
            <div id="modal-delete" class="reveal-modal" data-reveal aria-labelledby="modalDelete"
                 aria-hidden="true" role="dialog">

                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this poster?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" class="modal-delete-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="tiny"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="tiny alert">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>

                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>

        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#posters-table").DataTable({
                pageLength: 50
            });
        });

        $(document).on("click", ".modal-delete", function () {
            var dataId = $(this).data('poster-id');
            $('.modal-delete-form').attr('action', 'http://posterlog.app/admin/poster/' + dataId);
        });
    </script>
@stop