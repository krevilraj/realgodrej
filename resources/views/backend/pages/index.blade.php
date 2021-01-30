@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>All Pages
                <small>({{ $pagesCount }})</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pages</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    @include('backend.partials.message-success')
                    @include('backend.partials.message-error')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Pages</h3>
                            <a href="{{ route('dashboard.page.create') }}" class="btn btn-sm btn-danger pull-right">Add
                                New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Author</th>
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
                                    <th>Slug</th>
                                    <th>Author</th>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@include('backend.partials.datatables')
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                aaSorting: [[0, 'desc']],
                columnDefs: [
                    {"width": "2%", "targets": 0},
                    {"width": "5%", "targets": 1},
                    {"width": "28%", "targets": 2}
                ],
                processing: true,
                serverSide: true,
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            var pageEditUrl = "{{ route('dashboard.page.edit', ':id') }}";

                            pageEditUrl = pageEditUrl.replace(':id', data);
                            return '<a href="' + pageEditUrl + '">#' + data + '</a>';
                        }
                    },
                    {
                        data: 'featured_image',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="' + data + '" width="50">';
                        }
                    },
                    {
                        data: 'name',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/dashboard/page') }}' + '/' + row.id + '/edit' + '">' + data + '</a>';
                        }
                    },
                    {data: 'slug', name: 'slug'},
                    {data: 'author', name: 'author'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'id',
                        orderable: false,
                        render: function (data, type, row) {
                            var tempViewUrl = "{{ route('dashboard.page.index', ':slug') }}";
                            var tempEditUrl = "{{ route('dashboard.page.edit', ':id') }}";
                            var tempDeleteUrl = "{{ route('dashboard.page.destroy', ':id') }}";

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
                ajax: '{{ route('dashboard.pages.json') }}'
            });
        });
    </script>
@endpush
