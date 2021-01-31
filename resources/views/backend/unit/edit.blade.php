@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Business Units</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.unit.index') }}">Unit</a></li>
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
                </div>

                    {!! Form::model($unit, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\UnitController@update', $unit->id], 'class' => '']) !!}
                    @include('backend.unit.form', ['submitButtonText' => 'Update'])
                    {!! Form::close() !!}

            </div>
        </section>
    </div>

@endsection
