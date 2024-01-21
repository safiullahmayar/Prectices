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
                <form class="forms-sample" method="post" action="{{ route('property.store') }}">
                    <div class="row profile-body  ">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card w-75 h-100">
                                <div class="card-body">

                                    <h6 class="card-title"> Form</h6>

                                    @csrf
                                    {{-- @method('put') --}}
                                    {{ view('property.form_field') }}


                                </div>
                            </div>
                        </div>
                        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper ">
                            <div class="card rounded h-100">
                                <div class="card-body">

                                    <div class="mt-3 d-block">
                                        <div class=" d-block align-items-center justify-content-end">
                                            <button type="submit"
                                                class="btn btn-outline-success waves-effect waves-float waves-light buttonToBlockUI me-1">
                                                <i data-feather='save'></i>
                                                {{ __('property.type.save') }} Site
                                            </button>
                                            <a href="{{ route('property.alltype') }}"
                                                class="btn btn-outline-danger waves-effect waves-float waves-light">
                                                <i data-feather='x'></i>
                                                {{ __('property.type.cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            @include('admin.layouts.footer')


        </div>
    </div>
@endsection
