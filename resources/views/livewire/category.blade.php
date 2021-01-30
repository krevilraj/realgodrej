@section('content')
  <!-- pageBdWrapNav -->
  <nav class="pageBdWrapNav bg-light" aria-label="breadcrumb">
    <div class="container">
      <div class="row align-items-md-center">
        <div class="col-12 col-md-7">
          <!-- breadcrumb -->
          <ol class="breadcrumb pageBreadcrumb m-0 p-0 text-capitalize">
            <li class="breadcrumb-item">
              <a href="home.html">
                <i class="fas fa-home icn"><span class="sr-only">icon</span></i>
                Home
              </a>
            </li>
            <li class="breadcrumb-item"><a href="/category/{{$category->slug}}">shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
          </ol>
        </div>
        <div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
          <!-- title -->
          <strong
              class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">{{$category->name}}</strong>
        </div>
      </div>
    </div>
  </nav>
  <!-- contentAreaWrap -->
  <div class="contentAreaWrap contentBlock">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-9">
          <!-- content -->
          <article id="content" class="mb-5">

            <div class="row">
              @if($category_product->count() != 0)
                @foreach($category_product as $product)
                  <?php
                  $image = $product->getImageAttribute();
                  ?>
                  <div class="col-12 col-md-6 col-lg-4">
                    <!-- popItemColumn -->
                    <article class="popItemColumn hMbSmall hasOver text-center">
                      <!-- imageHolder -->
                      <div class="aligncenter imageHolder rounded position-relative d-flex">
												<span class="d-flex align-items-center wrap justify-content-center w-100">
													<span class="d-block w-100">
                            <a
                                href="{{ route('product.show', $product->slug) }}">
														<img src="{{ $image->mediumUrl }}" alt="{{$product->name}}">
                            </a>
													</span>
												</span>
                        <!-- popActionsList -->
                      </div>
                      <h3 class="text-capitalize"><a
                            href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h3>
                    </article>
                  </div>
                @endforeach

              @else
                <div class="col-md-12">
                  <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Opps oh!</h4>
                    <p>No items found in this category.</p>
                    <hr>
                    <p class="mb-0"><a href="{{ url('/') }}" style="padding: 10px;"
                                       class="btn btn-primary">Back</a></p>
                  </div>
                </div>
              @endif
            </div>

          </article>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
          <!-- sidebar -->
          <aside id="sidebar">

            <!-- widget categories -->
            <nav class="widget widget_categories">
              <h3 class="text-capitalize">Product Categories</h3>
              <ul class="m-0 p-0 list-unstyled">
                <?php
                $categories = \App\Category::latest()->get();
                ?>
                @foreach($categories as $category)
                  <li class="cat-item cat-item1"><a class="position-relative d-block"
                                                    href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </nav>

            <div class="widget rpListWidget">
              <h3 class="text-capitalize">Featured Product</h3>
              <ul class="list-unstyled pl-0 mb-0">
                @foreach($featuredProducts as $product)
                  <li class="hasOver">
                    <!-- imgWrap -->
                    <?php
                    $image = $product->getImageAttribute();
                    ?>
                    <div class="alignleft imgWrap text-center">
                      <a href="{{ route('product.show', $product->slug) }}">
                        <img src="{{ $image->smallUrl }}" alt="{{$product->name}}">
                      </a>
                    </div>
                    <div class="descrWrap">
                      <h4><a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a></h4>
                    </div>
                  </li>
                @endforeach

              </ul>
            </div>
            <!-- widget tag cloud -->

            <!-- helpVisualWidget -->
            <div class="widget helpVisualWidget text-center bgCover position-relative rounded hasShadow text-white"
                 style="background-image: url(images/img01.jpg);">
              <div class="align position-relative">
                <h3 class="text-capitalize fontBase">
                  <span class="d-block">Call Us Need Help ?</span>
                  <span class="d-block">{{getConfiguration('site_primary_phone')}}</span>
                </h3>
                <a href="tel:{{getConfiguration('site_primary_phone')}}"
                   class="btn btnTheme font-weight-normal text-uppercase" data-hover="Call Us">
                  <span class="d-block btnText">Call Us</span>
                </a>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
@endsection