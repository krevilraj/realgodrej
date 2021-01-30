@section('content')
    <div class="pro_secs">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12">
                <img src="{{$product->image->url}}" id="main-img">
            </div>
            <div class="col-lg-5 col-md-6 col-12">
                <div class="pro_secs_info">
                    <div class="infowithshare">
                        <h3>{{$product->name}}
                        </h3>
                        <div class="shareIcon">
                            <img src="{{asset('assets/images/share.svg')}}">
                        </div>
                    </div>
                    <div class="pro_secs_para">
                        {!! $product->short_description !!}
                    </div>

                    <div class="rows">
                        @foreach($product->specifications as $specification)
                            <div class="">
                                <p>{{$specification->title}}</p>
                                <p>{{$specification->description}}</p>
                            </div>
                        @endforeach

                    </div>

                    <div class="pricesecs">
                        <p>Price</p>
                        <p class="proprice">Rs 20,000</p>
                    </div>
                    @if(count($product->getProductGallery())>1)
                        <div class="pricesecs">
                            <p>Variant</p>
                            @foreach($product->getProductGallery() as $gallery)
                                <a href="javascript:void(0);" class="thumb-img" data-large="{{$gallery->url}}">
                                    <img src="{{$gallery->smallUrl}}">
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <a class="enq">
                        <img src="{{asset('assets/images/analysis.svg')}}">
                        Enquiry
                    </a>


                </div>
            </div>

            @if(isset($product->description))
                <div class="container">
                    <!-- shpTabsetAreaWrap -->
                    <div class="wwdTabsetAreaWrap shpTabsetAreaWrap position-relative">
                        <!-- mdTabsToAccordion -->
                        <div class="mdTabsToAccordion">
                            <!-- shpTabsetList -->
                            <ul class="nav nav-tabs d-none d-lg-flex wwdTabsetList shpTabsetList text-center"
                                role="tablist">
                                <li class="nav-item d-flex">
                                    <a class="nav-link d-flex align-items-center justify-content-center active position-relative"
                                       id="description-tab" data-toggle="tab" href="#description" role="tab"
                                       aria-controls="description"
                                       aria-selected="false">Description</a>
                                </li>
                            </ul>
                            <!-- tab content accordion -->
                            <div class="tab-content accordion" id="accordion01">
                                <!-- description tab -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                     aria-labelledby="description-tab">
                                    <!-- shpTabHolderWrap -->
                                    <div class="tabHolderWrap shpTabHolderWrap">
                                        <!-- accOpener -->
                                        <button class="accOpener text-left w-100 d-block position-relative d-lg-none"
                                                type="button"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">Description
                                        </button>
                                        <!-- collapseOne -->
                                        <div id="collapseOne" class="collapse show tabsToAccordionSlide"
                                             data-parent="#accordion01">
                                            <!-- accSlideHolder -->
                                            <div class="accSlideHolder">
                                                <h3 class="text-capitalize">Description</h3>
                                                {!! $product->description !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

        </div>

    </div>
    @if($product->getRelatedProduct()->count()>0)
    <div class="viewed-l">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">You Might Also Like</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme  homesliders">

                            <!-- Recently Viewed Item -->
                            @foreach($product->getRelatedProduct() as $related_product)
                                <div class="owl-item">
                                    <a href="{{ route('product.show', $related_product->slug) }}">
                                        <div class="topone hometopone">
                                            <img src="{{$related_product->image->url}}">
                                            <div class="toponedetails">
                                                <h4>{{$related_product->name}}</h4>

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
    @endif

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
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.thumb-img').click(function () {
                var image = $(this).data('large');
                $('#main-img').attr('src', image);
            })
        });
    </script>

@endpush
