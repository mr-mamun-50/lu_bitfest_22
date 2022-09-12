@extends('admin.layouts.app')

@section('title')
    Busses
@endsection
<?php $menu = 'Busses';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add Bus
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Code Name</th>
                            <th>Capacity</th>
                            <th>Liscence No</th>
                            <th>bus_category</th>
                            <th>Driver</th>
                            <th>Route</th>
                            <th>Status</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($busses as $index => $bus)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $bus->code_name }}</td>
                                <td>{{ $bus->capacity }}</td>
                                <td>{{ $bus->liscence_number }}</td>
                                <td>{{ $bus->bus_category }}</td>
                                <td>{{ $bus->name }}</td>
                                <td>{{ $bus->label }}</td>
                                <td>
                                    @if ($bus->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary mr-1 px-1 py-0" data-toggle="modal"
                                            data-target="{{ '#editBus' . $bus->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('busses.destroy', $bus->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for edit bus -->
                            <div class="modal fade" id="{{ 'editBus' . $bus->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{ $bus->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('busses.update', $bus->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="code_name">Code Name</label>
                                                    <input type="text" name="code_name" id="code_name"
                                                        class="form-control" value="{{ $bus->code_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="capacity">Capacity</label>
                                                    <input type="number" name="capacity" id="capacity"
                                                        class="form-control" value="{{ $bus->capacity }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="liscence_number">Liscence Number</label>
                                                    <input type="text" name="liscence_number" id="liscence_number"
                                                        class="form-control" value="{{ $bus->liscence_number }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="my-input">Category</label>
                                                    <select name="bus_category" id="" class="form-control">
                                                        <option value="Student"
                                                            @if ($bus->bus_category == 'Student') selected @endif>Student
                                                        </option>
                                                        <option value="Teachers"
                                                            @if ($bus->bus_category == 'Teachers') selected @endif>Teachers
                                                        </option>
                                                        <option value="Staff or Officials"
                                                            @if ($bus->bus_category == 'Staff or Officials') selected @endif>Staff or
                                                            Officials</option>
                                                        <option value="Others"
                                                            @if ($bus->bus_category == 'Others') selected @endif>Others
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="driver_id">Driver</label>
                                                    <select name="driver_id" id="driver_id" class="form-control">
                                                        @foreach ($drivers as $driver)
                                                            <option value="{{ $driver->id }}"
                                                                {{ $bus->driver_id == $driver->id ? 'selected' : '' }}>
                                                                {{ $driver->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="route_id">Route</label>
                                                    <select name="route_id" id="route_id" class="form-control">
                                                        @foreach ($routes as $route)
                                                            <option value="{{ $route->id }}"
                                                                {{ $bus->route_id == $route->id ? 'selected' : '' }}>
                                                                {{ $route->label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="is_active" value=1
                                                        @if ($bus->is_active == 1) checked @endif id="is_active">
                                                    <label for="my-input" class="form-check-label">Active</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Bus
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('busses.store') }}" method="POST">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="my-input">Code Name</label>
                                    <input class="form-control @error('code_name') is-invalid @enderror" type="text"
                                        name="code_name">
                                    @error('code_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Capacity</label>
                                    <input class="form-control" type="number" name="capacity">
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Liscence no</label>
                                    <input class="form-control @error('liscence_number') is-invalid @enderror"
                                        type="text" name="liscence_number">
                                    @error('liscence_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Category</label>
                                    <select name="bus_category" id="" class="form-control">
                                        <option value="Student">Students</option>
                                        <option value="Teachers">Teachers</option>
                                        <option value="Staff or Officials">Staff or
                                            Officials</option>
                                        <option value="Others">Others
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Driver</label>
                                    <select name="driver_id" id="" class="form-control">
                                        <option disabled selected>Choose Driver
                                        </option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">
                                                {{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="my-input">Route</label>
                                    <select name="route_id" id="" class="form-control">
                                        <option disabled selected>Choose Route
                                        </option>
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}">
                                                {{ $route->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value=1 checked>
                                    <label for="my-input" class="form-check-label">Active</label>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-light" data-dismiss="modal">Reset</button>
                                <button type="submit" class="btn btn-primary">Add
                                    Bus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
