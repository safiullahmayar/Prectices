@extends('admin.layouts.app')
{{-- <link rel="stylesheet" href="htp://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}

@section('main')
<script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
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
                @if (session('message'))
                    <script>
                        Swal.fire("{{ session('message') }}");
                    </script>
                @endif
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{ route('create_role') }}" class="btn btn-primary btn-lg ">Add New role </a>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-9 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">All Type Of role</h6>

                                <div class="table-responsive" id="myTable">
                                    @if ($role)
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($role as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td> <a href="{{ route('role.edit',['id' => $item->id]) }}"
                                                                class="btn  btn-outline-success btn-sm text-center">Edit</a>
                                                            <a href="#" id="delete"
                                                                onclick="deleterole('{{ $item->id }}')"
                                                                class="btn  btn-outline-danger btn-sm text-center">Delete</a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <th class="text-light">
                                            Not Found
                                        </th>
                                    @endif
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
        function deleterole(id) {
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
                    window.location.href = "/role/delete/" + id;
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
