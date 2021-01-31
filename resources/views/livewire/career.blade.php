@section('content')

    <div class="career-title">
        <h1>Our Job Vacancy</h1>
    </div>
    <section class="container">

        @foreach($careers as $career)
            <div class="career-section">
                <div class="career">
                    <img src="{{asset('assets/images/user.png')}}" alt="image">
                    <h3><a href="/career/{{$career->id}}">{{$career->title}}</a></h3>
                    <small>expires on {{$career->expire_in}}</small>
                </div>

                @endforeach
            </div>

    </section>
@endsection
