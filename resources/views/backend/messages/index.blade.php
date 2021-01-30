@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Message Members
                            <small>({{ $messagecount }})</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
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
                                <h3 class="card-title">Message</h3>
                                <a href="{{ route('dashboard.message.create') }}" class="btn btn-sm btn-danger pull-right">Add
                                    New</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Contact Info</th>
                                        <th>Message From</th>
                                        <th>Message</th>
                                        <th>Created at</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Contact Info</th>
                                        <th>Message From</th>
                                        <th>Message</th>
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
            </div>
        </section>
    </div>


@include("backend.partials.datatables")
@endsection

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
                            var messageEditUrl = "{{ route('dashboard.message.edit', ':id') }}";

                            messageEditUrl = messageEditUrl.replace(':id', data);
                            return '<a href="' + messageEditUrl + '">#' + data + '</a>';
                        }
                    },

                    {data: 'full_name'},
                    {data: 'contact_info'},
                    {data: 'from'},
                    {data: 'message'},
                    {data: 'created_at'},
                    {
                        data: 'id',
                        orderable: false,
                        render: function (data, type, row) {
                            var tempEditUrl = "{{ route('dashboard.message.edit', ':id') }}";
                            var tempDeleteUrl = "{{ route('dashboard.message.destroy', ':id') }}";

                            tempEditUrl = tempEditUrl.replace(':id', data);
                            tempDeleteUrl = tempDeleteUrl.replace(':id', data);

                            var actions = '';
                            actions += "<a href='" + tempEditUrl + "' class='btn btn-xs btn-info mr-15'><i class=\"fas fa-pencil-alt\"></i></a>";
                            actions += "<form action='" + tempDeleteUrl + "' class='d-inline' method='post'>";
                            actions += "<input type='hidden' name='_token' value='{{ csrf_token() }}'>";
                            actions += "<input type='hidden' name='_method' value='DELETE'>";
                            actions += "<button type='submit' class='btn btn-xs btn-danger'><i class=\"fas fa-trash-alt\"></i></button>";
                            actions += "</form>";

                            return actions;
                        }
                    }
                ],
                ajax: '{{ route('dashboard.message.json') }}'
            });
        });
    </script>
@endpush
