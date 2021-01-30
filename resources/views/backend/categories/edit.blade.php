@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                            <li><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    @include('backend.partials.message-success')
                    @include('backend.partials.message-error')
                </div>
                {!! Form::model($cat, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\CategoryController@update', $cat->id]]) !!}
                @include('backend.categories.form-edit', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
        </section>
    </div>



@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush