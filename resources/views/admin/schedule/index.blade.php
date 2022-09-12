@extends('admin.layouts.app')

@section('title')
    Schedule
@endsection
<?php $menu = 'schedules';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Teachers</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add schedule
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Arrival Time</th>
                            <th>Departure Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $index => $schedule)
                            <tr>
                                <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <td>
                                        <div class="form-group">
                                            <select name="day" id="" class="form-control">
                                                <option value="Saturday" @if ($schedule->day == 'Saturday') selected @endif>
                                                    Saturday</option>
                                                <option value="Sunday" @if ($schedule->day == 'Sunday') selected @endif>
                                                    Sunday</option>
                                                <option value="Monday" @if ($schedule->day == 'Monday') selected @endif>
                                                    Monday</option>
                                                <option value="Tuesday" @if ($schedule->day == 'Tuesday') selected @endif>
                                                    Tuesday</option>
                                                <option value="Wednesday" @if ($schedule->day == 'Wednesday') selected @endif>
                                                    Wednesday</option>
                                                <option value="Thursday" @if ($schedule->day == 'Thursday') selected @endif>
                                                    Thursday</option>
                                                <option value="Friday" @if ($schedule->day == 'Friday') selected @endif>
                                                    Friday</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="arrival_time"
                                                value="{{ $schedule->arrival_time }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="departure_time"
                                                value="{{ $schedule->departure_time }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary mr-1 btn-sm"><i
                                                    class="fas fa-upload fa-sm mr-1"></i> Update </button>


                                </form>
                                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
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
            <div class="modal-dialog modal-dialogue-centered">
                <div class="modal-content">
                    <div class="modal-header bg-default text-dark rounded">
                        <h5 class="modal-title" id="staticBackdropLabel">Add schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('schedule.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="subject">Day</label>
                                <select name="day" id="" class="form-control">
                                    <option value="">Select Day</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Arrival time</label>
                                <input type="text" class="form-control" name="arrival_time">
                            </div>

                            <div class="form-group">
                                <label for="subject">Departure time</label>
                                <input type="text" class="form-control" name="departure_time">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn  btn-primary">Add Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
