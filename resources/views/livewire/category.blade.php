@section('content')
    <div class="category_banner">
        @if($category->banner_img!="")
            <img alt="logo" src="{{ url('storage') . '/' . $category->banner_img }}"/>

        @endif
    </div>

    <div class="about_area container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mainwash" style="border:unset">
                <h3>{{$category->name}}</h3>

            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <p>
                    {{$category->description}}

                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid washblock">
        <div class="rowsblock">
            @foreach($category->products as $product)
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
