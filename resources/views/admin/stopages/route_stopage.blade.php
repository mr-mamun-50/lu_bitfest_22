@extends('admin.layouts.app')

@section('title')
    Route stopages
@endsection
<?php $menu = 'Route_stopages';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add route_stopage
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Route</th>
                            <th>Stopage</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($route_stopages as $index => $route_stopage)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <form action="{{ route('route-stopages.update', $route_stopage->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <td>
                                        <div class="form-group">
                                            <select name="route_id" id="" class="form-control">
                                                <option value="">Select Route</option>
                                                @foreach ($bus_routes as $route)
                                                    <option value="{{ $route->id }}"
                                                        {{ $route->id == $route_stopage->route_id ? 'selected' : '' }}>
                                                        {{ $route->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="stopage_id" id="" class="form-control">
                                                <option value="">Select Stopage</option>
                                                @foreach ($stopages as $stopage)
                                                    <option value="{{ $stopage->id }}"
                                                        {{ $stopage->id == $route_stopage->stopage_id ? 'selected' : '' }}>
                                                        {{ $stopage->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="order" class="form-control"
                                                value="{{ $route_stopage->order }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary mr-1 btn-sm"><i
                                                    class="fas fa-upload fa-sm mr-1"></i> Update </button>


                                </form>
                                <form action="{{ route('route-stopages.destroy', $route_stopage->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                            class="bi bi-trash mr-1"></i> Delete</button>
                                </form>
            </div>
            </td>
            </tr>
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
                        <h5 class="modal-title" id="staticBackdropLabel">Add route_stopage</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('route-stopages.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="subject">Route</label>
                                <select name="route_id" id="" class="form-control">
                                    <option value="">Select Route</option>
                                    @foreach ($bus_routes as $route)
                                        <option value="{{ $route->id }}">
                                            {{ $route->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Route</label>
                                <select name="stopage_id" id="" class="form-control">
                                    <option value="">Select Stopage</option>
                                    @foreach ($stopages as $stopage)
                                        <option value="{{ $stopage->id }}">
                                            {{ $stopage->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Order</label>
                                <input type="text" class="form-control" name="order">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn  btn-primary">Add route_stopage</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
