@extends('admin.layouts.app')
<link rel="stylesheet" href="htp://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
@section('main')
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.header')
            <div class="page-content">
                {{-- @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times">x</i>
                        </button>
                        <strong>Success !</strong> {{ session('message') }}
                    </div>
                @endif --}}
                @if (session('status'))
                    <script>
                        Swal.fire("{{ session('status') }}");
                    </script>
                @endif
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-9 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Import Xls</h6>

                                <div class="table-responsive" id="myTable">
                                    <form action="{{ route('permission.import') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label"> Import Xls file<span
                                                    class="text-danger">*</span></label>

                                            <input type="file" class="form-control" id="" name="name"
                                                autocomplete="off" placeholder="type name">
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-warning " type="submit">Upload</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            @include('admin.layouts.footer')

        </div>
    </div>
    <script>
        function deletepermission(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(status) {
                if (status.isConfirmed) {
                    window.location.href = "/permission/delete/" + id;
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
