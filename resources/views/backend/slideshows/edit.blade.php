@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Slideshow</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Slideshow</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                    <!-- /.card-header -->
                    <!-- form start -->
                @include('backend.partials.message-success')
                @include('backend.partials.message-error')
                {!! Form::model($slideshow, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\SlideshowController@update', $slideshow->id], 'class' => '']) !!}
                @include("backend.slideshows.form")
                {!! Form::close() !!}

                <!--/.col (left) -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

