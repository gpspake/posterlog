@extends('admin.layout')

@section('content')
    <br>
    <div class="row">
        <div class="medium-6 columns">
            <h3>Tags
                <small>» Listing</small>
            </h3>
        </div>
        <div class="medium-6 columns text-right">
            <a href="/admin/tag/create" class="button tiny right">
                <i class="fa fa-plus-circle"></i> New Tag
            </a>
        </div>
    </div>

    <div class="row">
        <div class="columns">

            @include('admin.partials.errors')
            @include('admin.partials.success')

            <table id="tags-table" class="full-width-table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Title</th>
                    <th class="hidden-sm">Subtitle</th>
                    <th class="hidden-md">Meta Description</th>
                    <th data-sortable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td>{{ $tag->title }}</td>
                        <td class="hidden-sm">{{ $tag->subtitle }}</td>
                        <td class="hidden-md">{{ $tag->meta_description }}</td>
                        <td>
                            <a href="/admin/tag/{{ $tag->id }}/edit"
                               class="button tiny">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });
    </script>
@stop