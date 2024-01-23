@extends('admin.layouts.app')
@section('main')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="path/to/jquery.validate.min.js"></script>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <div class="page-content">
                <form class="forms-sample" id="MyForm" method="post" action="{{ route('amenites.store') }}">
                    <div class="row profile-body  ">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card w-75 h-100">
                                <div class="card-body">

                                    <h6 class="card-title"> Form</h6>

                                    @csrf
                                    {{-- @method('put') --}}
                                    {{ view('amenites.form_field') }}


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
                                                {{ __('property.type.save') }}
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
        <!-- jQuery -->
        {{-- <script> --}}
            <script>
                $(document).ready(function() {
                    $('#myForm').validate({
                        messages: {
                            username: "Please enter a valid username."
                        }
                    });
                });
        {{-- </script> --}}
        </script>
        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $('#formid').validate({
                    rules: {
                        amenites_name: {
                            required: true,
                        },

                    },
                    messages: {
                        amenites_name: {
                            required: 'Please Enter FieldName',
                        },


                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script> --}}
        {{-- // $(document).ready(function() {
        // $('#formid').validate({
        // rules: {
        // amenites_name: {
        // required: true,
        // minlength: 3,
        // maxlength: 255,
        // }
        // },
        // messages: {
        // amenites_name: {
        // required: "Please enter the amenity name",
        // minlength: "The amenity name must be at least 3 characters long",
        // maxlength: "The amenity name must not exceed 255 characters"
        // }
        // },
        // errorElement: 'span',
        // errorPlacement: function(error, element) {
        // error.addClass('invalid');
        // element.closest('.form-group').append(error);
        // },
        // highlight: function(element, errorClass, validClass) {
        // $(element).addClass('is-invalid').removeClass('is-valid');
        // },
        // unhighlight: function(element, errorClass, validClass) {
        // $(element).removeClass('is-invalid').addClass('is-valid');
        // },
        // });
        // }); --}}
    @endsection
