@extends('admin.layouts.app')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <div class="page-content">


                <div class="row profile-body">
                    <!-- left wrapper start -->
                    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                        <div class="card rounded w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center mb-2">

                                    <img src="{{ !empty($userData->image) ? url('upload/admin_image/'.$userData->image) : url('upload/no_image.jpg') }}"
                                        alt="" class="rounded-circle " width="50px" height="50px">
                                </div>
                                <p></p>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
                                    <p class="text-muted">{{ $userData->name }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                                    <p class="text-muted">{{ $userData->email }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                                    <p class="text-muted">{{ $userData->address }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label>
                                    <p class="text-muted">{{ $userData->phone }}</p>
                                </div>
                                <div class="mt-3 d-flex social-links">
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="github"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- left wrapper end -->

                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card w-100">
                            <div class="card-body">

                                <h6 class="card-title"> Form</h6>

                                <form class="forms-sample" method="post" action="{{ route('update.admin') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                            value="{{ $userData->name }}" autocomplete="off" placeholder="Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="Username" value="{{ $userData->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            value="{{ $userData->email }}" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" autocomplete="off"
                                            placeholder="Address" name="address" value="{{ $userData->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="phone" autocomplete="off"
                                            placeholder="Phone No" name="phone" value="{{ $userData->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Image" class="form-label">Image </label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">

                                        <img src="{{ !empty($userData->image) ? url('upload/admin_image/'.$userData->image) : url('upload/no_image.jpg') }}"
                                            alt="" class="rounded-circle " width="60px" height="60px"
                                            id="getimage">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.layouts.footer')


        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#image").change(function(e) {
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#getimage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
