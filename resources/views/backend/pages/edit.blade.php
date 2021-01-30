@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit Page</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="{{ url('/dashboard/page') }}">Page</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    @include('backend.partials.message-success')
                    @include('backend.partials.message-error')
                </div>
            </div>

                {!! Form::model($page, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\PageController@update', $page->id], 'class' => 'row']) !!}
                @include('backend.pages.form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')
    <script>
        jQuery(function () {
            CKEDITOR.replace('content');
        });
    </script>
@endpush
