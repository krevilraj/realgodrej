@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Career Member</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.career.index') }}">Career</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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

                    {!! Form::model($career, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\CareerController@update', $career->id], 'class' => '']) !!}
                    @include('backend.career.form', ['submitButtonText' => 'Update'])
                    {!! Form::close() !!}

                </div>
            </div>
        </section>
    </div>

@endsection
