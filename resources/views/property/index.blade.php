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
                {{-- {{ $dataTable->table() }} --}}
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{  }}" class="btn btn-primary btn-lg ">Add Property Type</a>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">All Type Of properties</h6>
                              
                                <div class="table-responsive" id="myTable">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Ican type</th>
                                                <th class="">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($properties as $property)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $property->type_name }}</td>
                                                    <td>{{ $property->description }}</td>
                                                    <td>{{ $property->type_ican }}</td>

                                                    <td> <a href="{{ $property->id }}"
                                                            class="btn  btn-outline-success btn-sm text-center">Edit</a>
                                                        <a href=""
                                                            class="btn  btn-outline-danger btn-sm text-center">Delete</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
        let table = new DataTable('#myTable');
    </script>
@endsection
