@extends('admin.layout')

@section('styles')
    <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Posters
                    <small>» Edit Poster</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Poster Edit Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('admin.poster.update', $id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            @include('admin.poster._form')

                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="button tiny"
                                                name="action" value="continue">
                                            <i class="fa fa-floppy-o"></i>
                                            Save - Continue
                                        </button>
                                        <button type="submit" class="button tiny success"
                                                name="action" value="finished">
                                            <i class="fa fa-floppy-o"></i>
                                            Save - Finished
                                        </button>
                                        <button type="button" class="button tiny alert" data-reveal-id="modal-delete">
                                            <i class="fa fa-times-circle"></i>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                <form method="POST" action="{{ route('admin.poster.destroy', $id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> Yes
                    </button>
                </form>
            </div>

            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
    </div>

@stop

@section('scripts')
    <script src="/assets/pickadate/picker.js"></script>
    <script src="/assets/pickadate/picker.date.js"></script>
    <script src="/assets/pickadate/picker.time.js"></script>
    <script src="/assets/selectize/selectize.min.js"></script>
    <script>
        $(function () {
            $("#publish_date").pickadate({
                format: "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>
@stop