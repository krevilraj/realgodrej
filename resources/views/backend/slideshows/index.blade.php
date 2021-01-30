@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slideshow</h1>
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
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Slideshow</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                                        <th>Name</th>
                                        <th>Link</th>

                                        <th>Author</th>
                                        <th>Date</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slideshows as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{ optional($data->getImage())->smallUrl }}" width="50"
                                                     alt=""></td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->link}}</td>
                                            <td> {{$data->user->name}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                <span style="display: flex;justify-content: space-evenly;">
                                                <a href="{{route('dashboard.slideshows.edit',$data->id)}}">
                                                    <button class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                                                </a>
                                                <form action="{{ route('dashboard.slideshows.destroy', $data->id) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                                        <th>Name</th>
                                        <th>Link</th>

                                        <th>Author</th>
                                        <th>Date</th>
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
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@include("backend.partials.datatables")
@push('scripts')


    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush