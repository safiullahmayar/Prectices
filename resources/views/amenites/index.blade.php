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
                        <a href="{{ route('create_amenites') }}" class="btn btn-primary btn-lg ">Add amenite </a>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-5 grid-margin stretch-card offset-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">All Type Of amenite</h6>

                                <div class="table-responsive" id="myTable">
                                    @if ($amenties)
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($amenties as $amenite)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $amenite->amenites_name }}</td>


                                                        <td> <a href="{{ route('edit_amenites',['id'=>$amenite->id]) }}"
                                                                class="btn  btn-outline-success btn-sm text-center">Edit</a>
                                                            <a href="#" id="delete"
                                                                onclick="deleteamenite('{{ $amenite->id }}')"
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // $(function() {
    // $(document).on('click', '#delete', function(e) {
    // e.preventDefault();
    // var link = $(this).attr("href");


    // Swal.fire({
    // title: 'Are you sure?',
    // text: "Delete This Data?",
    // icon: 'warning',
    // showCancelButton: true,
    // confirmButtonColor: '#3085d6',
    // cancelButtonColor: '#d33',
    // confirmButtonText: 'Yes, delete it!'
    // }).then((result) => {
    // if (result.isConfirmed) {
    // window.location.href = link
    // Swal.fire(
    // 'Deleted!',
    // 'Your file has been deleted.',
    // 'success'
    // )
    // }
    // })


    // });

    // });
    function deleteamenite(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((message) => {
            if (message.isConfirmed) {
                window.location.href = "delete_amenites/"+id;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script>
