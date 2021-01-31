@section('content')
    <div>
        <div class="container">
            <section class="careers-detail">
                <h1>{{$career->title}}</h1>
                {!! $career->description !!}

            </section>
        </div>
    </div>
@endsection
