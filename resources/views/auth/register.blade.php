<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="bg-primary">

    <div class="logo text-center mt-5">
        <img src="{{ asset('images/logos/uni_logo.png') }}" alt="" style="width: 100px">
    </div>

    <div class="container col-md-8 col-lg-6 card card-body mt-5">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Student</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Teacher / Stuff</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <!-- Student -->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="font-medium text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="hidden" name="category" value="student">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form3Example3" class="form-control" />
                        <label class="form-label" for="form3Example3">Full name</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="email" name="email" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Email</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="phone" id="form3Example2" class="form-control" />
                                <label class="form-label" for="form3Example2">Phone</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-4 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="text" name="s_id" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Student ID</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-outline">
                                <input type="text" name="batch" id="form3Example2" class="form-control" />
                                <label class="form-label" for="form3Example2">Batch</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-outline">
                                <input type="text" name="section" id="form3Example2" class="form-control" />
                                <label class="form-label" for="form3Example2">Section</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="password" name="password" id="form3Example4" class="form-control" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="password" name="password_confirmation" class="form-control" />
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                </form>
            </div>


            <!-- Teacher / Stuff -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="hidden" name="category" value="stuff">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form3Example3" class="form-control" />
                        <label class="form-label" for="form3Example3">Full name</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="email" name="email" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Email</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="phone" id="form3Example2" class="form-control" />
                                <label class="form-label" for="form3Example2">Phone</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-4 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="text" name="t_id" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Teacher ID</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="">
                                <select name="t_dept" id="" class="form-control border-1">
                                    <option disabled selected>Choose department</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="BBA">BBA</option>
                                    <option value="English">English</option>
                                    <option value="Law">Law</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-outline">
                                <input type="text" name="t_designation" id="form3Example2"
                                    class="form-control" />
                                <label class="form-label" for="form3Example2">Designation</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="password" name="password" id="form3Example4" class="form-control" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="form-outline">
                                <input type="password" name="password_confirmation" class="form-control" />
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                </form>
            </div>
        </div>
        <!-- Pills content -->
    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
