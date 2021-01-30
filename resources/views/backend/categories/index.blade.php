@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Category </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.partials.message-success')
                        @include('backend.partials.message-error')
                    </div>
                    <div class="col-md-4">
                        {!! Form::open(['route'=>'dashboard.categories.store', 'files' => true, 'class' => '']) !!}
                        @include('backend.categories.form-create', ['submitButtonText' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories <small>({{ $categoriesCount }})</small></h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categoriesCount ==0)
                                        <tr>
                                            <td colspan="4">No categories available now</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>


    <!-- /.content -->
@endsection
@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@push('scripts')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            $('.datatable').DataTable({
                aaSorting: [[0, 'desc']],
                processing: true,
                serverSide: true,
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var categoryEditUrl = "{{ route('dashboard.categories.edit', ':id') }}";

                            categoryEditUrl = categoryEditUrl.replace(':id', data);
                            return '<a href="' + categoryEditUrl + '">#' + data + '</a>';
                        }
                    },
                    {
                        data: 'name',
                        render: function (data, type, row) {
                            var categoryEditUrl = "{{ route('dashboard.categories.edit', ':id') }}";

                            categoryEditUrl = categoryEditUrl.replace(':id', row.id);

                            return '<a href="' + categoryEditUrl + '">' + data + '</a>';
                        }
                    },

                    {data: 'created_at'},
                    {
                        data: 'id',
                        orderable: false,
                        render: function (data, type, row) {
                            var tempViewUrl = "{{ route('dashboard.categories.index', ':slug') }}";
                            var tempEditUrl = "{{ route('dashboard.categories.edit', ':id') }}";
                            var tempDeleteUrl = "{{ route('dashboard.categories.destroy', ':id') }}";

                            tempViewUrl = tempViewUrl.replace(':slug', row.slug);
                            tempEditUrl = tempEditUrl.replace(':id', data);
                            tempDeleteUrl = tempDeleteUrl.replace(':id', data);

                            var actions = '';
                            actions += "<a href='" + tempViewUrl + "' class='btn btn-sm btn-warning mr-15' target='_blank'><i class=\"far fa-eye\"></i></a>";


                            actions += "<a href='" + tempEditUrl + "' class='btn btn-sm btn-info mr-15'><i class=\"fas fa-pencil-alt\"></i></a>";
                            actions += "<form action='" + tempDeleteUrl + "' class='d-inline' method='post'>";
                            actions += "<input type='hidden' name='_token' value='{{ csrf_token() }}'>";
                            actions += "<input type='hidden' name='_method' value='DELETE'>";
                            actions += "<button type='submit' class='btn btn-sm btn-danger'><i class=\"fas fa-trash-alt\"></i></button>";
                            actions += "</form>";

                            return actions;
                        }
                    }
                ],
                ajax: '{{ route('dashboard.categories.json') }}'
            });
        });
    </script>
@endpush