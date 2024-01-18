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

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times">x</i>
                        </button>
                        <strong>Success !</strong> {{ session('message') }}
                    </div>
                @endif
               
                <div class="row profile-body">
                    <!-- left wrapper start -->
                    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                        <div class="card rounded w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center mb-2">

                                    <img src="{{ !empty($userData->image) ? url('upload/admin_image/' . $userData->image) : url('upload/no_image.jpg') }}"
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

                                <form class="forms-sample" method="post" action="{{ route('changePasswordSave') }}">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" id=""
                                            name="current_password" value="{{ old('current_password') }}" autocomplete="off"
                                            placeholder="old password">

                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id=""
                                            autocomplete="off" placeholder="New Password" value="{{ old('password') }}"
                                            name="password">
                                    </div>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id=""
                                            name="password_confirmation" value="" placeholder="Confirm Password">
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
    {{-- <script>
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
    </script> --}}
@endsection
