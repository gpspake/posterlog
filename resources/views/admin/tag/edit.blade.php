@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Tags
                    <small>» Edit Tag</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="columns">
                <div class="panel">
                    <h3>Tag Edit Form</h3>

                    @include('admin.partials.errors')
                    @include('admin.partials.success')

                    <form class="form-horizontal" role="form" method="POST"
                          action="/admin/tag/{{ $id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="form-group">
                            <label for="tag" class="col-md-3 control-label">Tag</label>

                            <div class="col-md-3">
                                <p class="form-control-static">{{ $tag }}</p>
                            </div>
                        </div>

                        @include('admin.tag._form')

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    Save Changes
                                </button>

                                <a href="#" class="button" data-reveal-id="modal-delete">
                                    <i class="fa fa-times-circle"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Confirm Delete --}}
                <div id="modal-delete" class="reveal-modal" data-reveal="data-reveal"
                     aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    <h4 class="modal-title">Please Confirm</h4>

                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this tag?
                    </p>

                    <form method="POST" action="/admin/tag/{{ $id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="close"
                                onclick="$('#modal-delete').foundation('reveal', 'close');"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@stop