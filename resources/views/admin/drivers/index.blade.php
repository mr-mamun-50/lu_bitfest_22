@extends('admin.layouts.app')

@section('title')
    Drivers
@endsection
<?php $menu = 'Drivers';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add driver
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $index => $driver)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->email }}</td>
                                <td>{{ $driver->phone }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary mr-1 px-1 py-0" data-toggle="modal"
                                            data-target="{{ '#editdriver' . $driver->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for add bus -->
                            <div class="modal fade" id="{{ 'editdriver' . $driver->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialogue-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-default text-dark rounded">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{ $driver->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        {{-- <form action="{{ route('drivers.update', $driver->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="_method" value="put">

                                                <div class="form-group">
                                                    <label for="subject">Label</label>
                                                    <input class="form-control" type="text" name="label"
                                                        value="{{ $driver->label }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Map Location <small class="text-muted">(Provide
                                                            iframe)</small></label>
                                                    <input class="form-control" type="text" name="map_location"
                                                        value="{{ $driver->map_location }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Description</label>
                                                    <textarea name="description" class="form-control summernote"> {{ $driver->description }}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-primary">Update driver</button>
                                            </div>
                                        </form> --}}
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
                <div class="modal-dialog modal-dialogue-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Add driver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('drivers.store') }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="subject">Name</label>
                                    <input class="form-control" type="text" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Email</label>
                                    <input class="form-control @error('subject') is-invalid @enderror" type="email"
                                        name="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="subject">Phone</label>
                                    <input class="form-control" type="text" name="phone" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add driver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
