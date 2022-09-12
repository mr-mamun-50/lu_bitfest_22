@extends('admin.layouts.app')

@section('title')
    Stopages
@endsection
<?php $menu = 'Stopages';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add stopage
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Map location</th>
                            <th>Description</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stopages as $stopage)
                            <tr>
                                <td>{{ $stopage->label }}</td>
                                <td class="stopage">
                                    @php
                                        echo $stopage->map_location;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        echo $stopage->description;
                                    @endphp
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary mr-1 px-1 py-0" data-toggle="modal"
                                            data-target="{{ '#editstopage' . $stopage->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('stopages.destroy', $stopage->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for add bus -->
                            <div class="modal fade" id="{{ 'editstopage' . $stopage->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialogue-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-default text-dark rounded">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{ $stopage->label }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('stopages.update', $stopage->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="_method" value="put">

                                                <div class="form-group">
                                                    <label for="subject">Label</label>
                                                    <input class="form-control" type="text" name="label"
                                                        value="{{ $stopage->label }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Map Location <small class="text-muted">(Provide
                                                            iframe)</small></label>
                                                    <input class="form-control" type="text" name="map_location"
                                                        value="{{ $stopage->map_location }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="subject">Description</label>
                                                    <textarea name="description" class="form-control summernote"> {{ $stopage->description }}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-primary">Update stopage</button>
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
                            <h5 class="modal-title" id="staticBackdropLabel">Add stopage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('stopages.store') }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="subject">Label</label>
                                    <input class="form-control" type="text" name="label" required>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Map Location <small class="text-muted">(Provide
                                            iframe)</small></label>
                                    <input class="form-control" type="text" name="map_location" required>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Description</label>
                                    <textarea name="description" class="form-control summernote"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add stopage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
