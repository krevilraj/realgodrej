<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('layouts.partials.init_meta')
    @include('layouts.partials.init_styles')

    @stack('styles')
</head>
<body>

<!--===== Pre-Loading area Start =====-->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>

@include('layouts.partials.header')

@yield('content')

@include('layouts.partials.footer')
@include('layouts.partials.init_script')
@stack('scripts')
</body>

