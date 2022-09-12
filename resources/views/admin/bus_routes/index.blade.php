@extends('admin.layouts.app')

@section('title')
    Routes
@endsection
<?php $menu = 'Routes';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add Route
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Route No</th>
                            <th>Route Name</th>
                            <th>Map Link</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                            <tr>
                                <td>{{ $route->route_no }}</td>
                                <td>{{ $route->label }}</td>
                                <td>
                                    <a href="{{ $route->map_link }}" class="btn btn-info" target="blank">See Map</a>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary mr-1 px-1 py-0" data-toggle="modal"
                                            data-target="{{ '#editRoute' . $route->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('routes.destroy', $route->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for add bus -->
                            <div class="modal fade" id="{{ 'editRoute' . $route->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialogue-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-default text-dark rounded">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{ $route->label }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('routes.update', $route->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="_method" value="put">

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="subject">Route no</label>
                                                        <input class="form-control" type="number" name="route_no"
                                                            value="{{ $route->route_no }}">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="subject">Label</label>
                                                        <input class="form-control" type="text" name="label"
                                                            value="{{ $route->label }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Map Link</label>
                                                    <input class="form-control" type="text" name="map_link"
                                                        value="{{ $route->map_link }}">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-primary">Update Route</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal for add bus -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialogue-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Route</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('routes.store') }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="subject">Route no</label>
                                        <input class="form-control @error('route_no') is-invalid @enderror" type="number"
                                            name="route_no" required>
                                        @error('route_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="subject">Label</label>
                                        <input class="form-control" type="text" name="label" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Map Link</label>
                                    <input class="form-control" type="text" name="map_link" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add Route</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
