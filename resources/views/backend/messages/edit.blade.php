@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.message.index') }}">Message</a></li>
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



                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-body">

                                <div class="row">
                                    <p class="col-md-3">
                                        Full Name
                                    </p>
                                    <p class="col-md-6">
                                        {{$message->first_name}} {{$message->last_name}}
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-md-3">
                                        Message From
                                    </p>
                                    <p class="col-md-6">
                                        {{$message->from}}
                                    </p>
                                </div>


                                <div class="row">
                                    <p class="col-md-3">
                                        Contact info
                                    </p>
                                    <div class="col-md-6">
                                        <p>Email: {{$message->email}}</p>
                                        <p>Phone: {{$message->phone}}</p>
                                        <p>Address: {{$message->address}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <p class="col-md-3">
                                        Message
                                    </p>
                                    <div class="col-md-6">
                                        {{$message->message}}
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>




                </div>
            </div>
        </section>
    </div>

@endsection
