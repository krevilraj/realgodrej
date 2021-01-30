@extends('layouts.app')

@section('content')



    <div class="missionbanner">
        <img src="{{ optional($page->getImage())->url }}" class="priv">
    </div>

    <div class="ourmissionstarts container">
        <h1>{{ $page->title }}</h1>
        {!! $page->content !!}

    </div>
@endsection
