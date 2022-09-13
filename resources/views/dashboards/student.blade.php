<div class="card">
    <div class="card-header bg-primary text-white py-5 px-5 heading">
        <h1 class="py-4 text-center">Student Dashboard</h1>
    </div>
    <div class="card-body px-5">

        <div class="row">
            <div class="col">
                <div class="card bg-success">
                    <div class="card-body text-white">
                        <h5 class="card-title">Routes Available</h5>

                        <p class="card-text">4</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Seat Available this Route</h5>
                        <p class="card-text">24</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-secondary">
                    <div class="card-body text-white">
                        <h5 class="card-title">Next Bus</h5>
                        <p class="card-text">3:00</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-danger">
                    <div class="card-body text-white">
                        <h5 class="card-title">Nearest Transport</h5>
                        <p class="card-text">7 minutes left</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex my-4">

            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Schedule</h4>
                    </div>
                    <div class="card-body pt-5">
                        <h3 class="text-success text-center"> Bus successfully asigned for you</h3>
                        <table class="table mt-5">
                            <tr>
                                <th>Bus code:</th>
                                <td>Bus 1</td>
                            </tr>
                            <tr>
                                <th>Stopage:</th>
                                <td>Shahi Eidgah</td>
                            </tr>
                            <tr>
                                <th>Time:</th>
                                <td>2:00 pm</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Update your demand</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('demands.update', $demand->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="put">

                            <div class="mb-4 d-flex">
                                <label for="my-input">Stopage:</label>
                                <select name="stopage_id" id="" class="form-control w-75 ms-auto">
                                    <option disabled selected>Select Stopage</option>
                                    @foreach ($stopages as $stopage)
                                        <option value="{{ $stopage->id }}"
                                            @if ($stopage->id == $demand->stopage_id) selected @endif>{{ $stopage->label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Saturday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="sat_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($sat_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->sat_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="sat_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($sat_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->sat_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Sunday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="sun_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($sun_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->sun_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="sun_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($sun_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->sun_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Monday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="mon_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($mon_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->mon_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="mon_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($mon_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->mon_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Tuesday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="tue_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($tue_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->tue_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="tue_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($tue_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->tue_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Wednesday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="wed_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($wed_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->wed_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="wed_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($wed_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->wed_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Thursday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="thu_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($thu_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->thu_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="thu_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($thu_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->thu_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 d-flex">
                                <label for="my-input">Friday:</label>
                                <div class="d-flex ms-auto w-75">
                                    <div class="col me-1">
                                        <select name="fri_arr_time" id="" class="form-control">
                                            <option disabled selected>Arrival Time</option>
                                            @foreach ($fri_arr_time as $arrival)
                                                <option value="{{ $arrival->arrival_time }}"
                                                    @if ($arrival->arrival_time == $demand->fri_arr_time) selected @endif>
                                                    {{ $arrival->arrival_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                    <div class="col ms-1">
                                        <select name="fri_dep_time" id="" class="form-control">
                                            <option disabled selected>Depurture Time</option>
                                            @foreach ($fri_dep_time as $departure)
                                                <option value="{{ $departure->departure_time }}"
                                                    @if ($departure->departure_time == $demand->fri_dep_time) selected @endif>
                                                    {{ $departure->departure_time }}
                                                </option>
                                            @endforeach
                                            <option value="0">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 text-end">
                                <button type="submit" class="btn btn-primary">Set Demand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center mt-5">
                <a href="" class="btn btn-primary btn-lg mx-3">Class Routine</a>
                <a href="" class="btn btn-danger btn-lg mx-3">Bus Schedule</a>
            </div>

        </div>

    </div>
</div>
