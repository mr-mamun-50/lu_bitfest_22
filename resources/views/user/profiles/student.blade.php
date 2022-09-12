<div class="card">
    <div class="d-flex align-items-center card-header bg-primary text-white py-4 px-4 heading">
        <img src="{{ asset('images/asset_img/user.png') }}" alt="" style="width: 130px">
        <h2 class="ms-4">{{ Auth::user()->name }}</h2>
    </div>
    <div class="card-body">

        <div class="row my-4 d-flex justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="mb-3 d-flex">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control w-75 ms-auto" id="name" name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3 d-flex">
                                <label for="email" class="form-label">Email:</label>
                                <input readonly class="form-control w-75 ms-auto" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3 d-flex">
                                <label for="phone" class="form-label">Phone:</label>
                                <input readonly class="form-control w-75 ms-auto" id="phone" name="phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="mb-3 d-flex">
                                <label for="address" class="form-label">Batch:</label>
                                <input type="text" class="form-control w-75 ms-auto" id="address" name="batch"
                                    value="{{ Auth::user()->batch }}">
                            </div>
                            <div class="mb-3 d-flex">
                                <label for="address" class="form-label">Batch:</label>
                                <input type="text" class="form-control w-75 ms-auto" id="address" name="section"
                                    value="{{ Auth::user()->section }}">
                            </div>
                            <div class="mb-1 text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
