@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Product
                            <small>({{ $productsCount }})</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                                        <th>Name</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                                        <th>Name</th>
                                        <th>Featured</th>
                                        <th>Status</th>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@include('backend.partials.datatables')
@push('scripts')
    @php
        if (request()->has('product') || request()->has('category')){
            $route = route('dashboard.products.json') . '?product=' . request('product') . '&category=' . request('category');
        }
        else
            $route = route('dashboard.products.json');
    @endphp
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                aaSorting: [[0, 'desc']],
                columnDefs: [
                    {"width": "2%", "targets": 0},
                    {"width": "5%", "targets": 1},
                    {"width": "22%", "targets": 2}
                ],
                processing: true,
                serverSide: true,
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var productEditUrl = "{{ route('dashboard.product.edit', ':id') }}";

                            productEditUrl = productEditUrl.replace(':id', data);
                            return '<a href="' + productEditUrl + '">#' + data + '</a>';
                        }
                    },
                    {
                        data: 'path',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="' + data + '" width="50">';
                        }
                    },
                    {
                        data: 'name',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/product2') }}' + '/' + row.id + '">' + data + '</a>';
                        }
                    },

                    {
                        data: 'is_featured',
                        name: 'is_featured',
                        render: function (data, type, row) {
                            console.log(data);
                            return data === 1 ? 'Featured' : '-';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data, type, row) {
                            return data === 1 ? ' <span class="label   label-success"> Enabled</span>' : ' <span class="label label-danger"> Disabled</span>';
                        }
                    },


                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'id',
                        orderable: false,
                        render: function (data, type, row) {
                            var tempViewUrl = "{{ route('dashboard.product.index', ':slug') }}";
                            var tempEditUrl = "{{ route('dashboard.product.edit', ':id') }}";
                            var tempDeleteUrl = "{{ route('dashboard.product.destroy', ':id') }}";

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
                ajax: "{!! $route  !!}"
            });
        });
    </script>
@endpush