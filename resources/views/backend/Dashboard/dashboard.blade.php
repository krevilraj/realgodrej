@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid text-center">

                <h1 style="text-align: center;font-size:3.8rem">Welcome to {{trans('app.name')}} <br> Dashboard</h1>
                <a href="/">
                    <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('site_logo') }}" style="width:500px" class="text-center"/>
                </a>

            </div><!-- /.container-fluid -->
        </section>


    </div>
    <!-- /.content-wrapper -->
@endsection
