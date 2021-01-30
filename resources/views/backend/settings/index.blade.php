@extends('backend.layouts.app')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Setting</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12 col-sm-6">

                    <form action="{{ route('dashboard.settings.update') }}" method="post"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-general-tab" data-toggle="pill"
                                           href="#custom-tabs-four-general" role="tab"
                                           aria-controls="custom-tabs-four-general"
                                           aria-selected="false">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
                                           href="#custom-tabs-four-home" role="tab"
                                           aria-controls="custom-tabs-four-home"
                                           aria-selected="false">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-about-us-tab" data-toggle="pill"
                                           href="#custom-tabs-four-about-us" role="tab"
                                           aria-controls="custom-tabs-four-about-us"
                                           aria-selected="false">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
                                           href="#social" role="tab"
                                           aria-controls="social"
                                           aria-selected="false">Social</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                           href="#custom-tabs-four-messages-us" role="tab"
                                           aria-controls="custom-tabs-four-messages-us"
                                           aria-selected="false">Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-catelogue-tab" data-toggle="pill"
                                           href="#custom-tabs-four-catelogue-us" role="tab"
                                           aria-controls="custom-tabs-four-catelogue-us"
                                           aria-selected="false">Catelogue</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    @include('backend.settings.tab-general')
                                    @include('backend.settings.tab-home')
                                    @include('backend.settings.tab-about')
                                    @include('backend.settings.tab-contact')
                                    @include('backend.settings.tab-catelogue')
                                    @include('backend.settings.tab-social')



                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger pull-right">Update</button>
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>



@stop
@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>

        $(function () {
            $('.select2').select2({placeholder: 'Select Options'});
            $('.product-list').select2({
                placeholder: 'Select Product',
                minimumInputLength: 2,
                ajax: {
                    url: "{{ route('dashboard.search.product') }}",
                    dataType: 'json',
                    type: 'GET',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        return {
                            results: data
                        };
                    },
                    cache: true
                }

            });

        });

    </script>
@endpush
