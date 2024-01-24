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
                @if (session('message'))
                    <script>
                        Swal.fire("{{ session('message') }}");
                    </script>
                @endif
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{ route('create_permission') }}" class="btn btn-primary btn-lg ">Add New Permission </a>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-9 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">All Type Of Permission</h6>

                                <div class="table-responsive" id="myTable">
                                    @if ($permission)
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Group Name</th>

                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($permission as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->group_name }}</td>



                                                        <td> <a href="{{ route('edit_amenites', ['id' => $item->id]) }}"
                                                                class="btn  btn-outline-success btn-sm text-center">Edit</a>
                                                            <a href="#" id="delete"
                                                                onclick="deleteamenite('{{ $item->id }}')"
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
@endsection
