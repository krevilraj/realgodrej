@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Team Member</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.team.index') }}">Team</a></li>
                            <li class="breadcrumb-item active">Create</li>
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


                </div>

                {!! Form::open(['route'=>'dashboard.team.store', 'files' => true, 'class' => '']) !!}
                @include('backend.team.form', ['submitButtonText' => 'Submit'])
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@endsection