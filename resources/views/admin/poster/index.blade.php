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
                        <td width="180">
                            <a href="/admin/poster/{{ $poster->id }}/edit"
                               class="button tiny">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="/poster/{{ $poster->slug }}"
                               class="button tiny alert">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#posters-table").DataTable({});
        });
    </script>
@stop