@section('content')


    <div class="about_area container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 mainwash" style="border:unset">
                <h3>{{$query}}</h3>

            </div>

        </div>
    </div>
    <div class="container-fluid washblock">
        <div class="rowsblock">
            @foreach($result_products as $product)
                <div class=" mainwash">
                    <div class="topone hometopone">
                        <img src="{{$product->image->mediumUrl}}">
                        <div class="toponedetails">
                            <h4><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h4>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    @include('partials.offer')



@endsection
@push('styles')
    <style>
        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
    </style>
@endpush
