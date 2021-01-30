@extends('layouts.app')
@section('content')
    <div>
        @livewire('partials.slideshows')

        <div class="about_area container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <h3><span class="godrej">{{getConfiguration('home_about_title')}}</span></h3>
                    <p style="white-space: pre-wrap">{{getConfiguration('home_about_description')}}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="{{ url('storage') . '/' . getConfiguration('home_about_image') }}">
                </div>
            </div>
        </div>
        <div class="viewed">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">{{getConfiguration('trending2title')}}</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme viewed_slider">

                                <!-- Recently Viewed Item -->

                                @foreach(getJsonConfiguration('trending2') as $product_id)
                                    @php
                                        $product = \App\Product::find($product_id);

                                    @endphp
                                    <div class="owl-item">
                                        <div class="topone row">
                                            <div class="col-md-7 col-sm-6">
                                                <img src="{{$product->image->url}}">
                                            </div>

                                            <div class="toponedetails col-md-5 col-sm-6">
                                                <h4>
                                                    <a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a>
                                                </h4>
                                                <p>{!! $product->short_description !!}</p>
                                                <a href="{{ route('product.show', $product->slug) }}" class="viewalls">View
                                                    All</a>
                                            </div>
                                        </div>

                                    </div>
                            @endforeach

                            <!-- Recently Viewed Item -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="offerings container-fluid">
            <div class="offerings_tit">
                <h3>{{getConfiguration('top_product_title')}}</h3>
            </div>

            <div class="offering_secs">
                <div class="rows">
                    @foreach(json_decode(getConfiguration('products_section_1')) as $category)
                        @php
                            $p_category = getCategoryByName($category);
                        @endphp
                        <div class="firstoffer">
                            <img src="{{ getFeaturedImage($p_category) }}" alt="{{$p_category->name}}">
                            <div class="offer_paras">
                                <h3>{{$p_category->name}}</h3>
                            </div>
                            <a href="{{route('shop.category',$p_category->slug)}}" class="viewalls">View All</a>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
        <div class="viewed">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">{{getConfiguration('cat_title_section1')}}</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme  homesliders">

                                <!-- Recently Viewed Item -->
                                @php
                                    $p_category = getCategoryByName(getConfiguration('cat_section1'));
                                    $products = $p_category->products->take(getConfiguration('cat_item_no_section1'));
                                @endphp
                                @foreach($products as $product)
                                <div class="owl-item">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <div class="topone hometopone">
                                            <img src="{{$product->image->url}}">
                                            <div class="toponedetails">
                                                <h4>{{$product->name}}</h4>

                                            </div>
                                        </div>

                                    </a>
                                </div>
                                @endforeach


                                <!-- Recently Viewed Item -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="viewed">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">{{getConfiguration('cat_title_section2')}}</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme  homesliders">

                                <!-- Recently Viewed Item -->
                                @php
                                    $p_category = getCategoryByName(getConfiguration('cat_section2'));
                                    $products = $p_category->products->take(getConfiguration('cat_item_no_section2'));
                                @endphp
                                @foreach($products as $product)
                                    <div class="owl-item">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <div class="topone hometopone">
                                                <img src="{{$product->image->url}}">
                                                <div class="toponedetails">
                                                    <h4>{{$product->name}}</h4>

                                                </div>
                                            </div>

                                        </a>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
