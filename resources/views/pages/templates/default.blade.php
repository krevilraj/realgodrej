@extends('layouts.app')

@section('content')

    <div class="about-container terms-container">
        <img src="{{ optional($page->getImage())->largePageUrl }}" class="priv">
    </div>
    <div class="termsbody container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h4>{{ $page->title }}</h4>
                <div class="mainterm">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
