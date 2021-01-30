<header id="pageHeader">
  <!-- pageHeaderTopBar -->
  <div class="pageHeaderTopBar bg-light">
    <div class="container clearfix position-relative">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <!-- topBarContactList -->
          <ul class="">
            <li>
              <a href="tel:{{getConfiguration('site_primary_phone')}}">
                <i class="fas fa-phone fa-flip-horizontal icn"><span class="sr-only">icon</span></i>
                <span class="d-lg-inline">{{getConfiguration('site_primary_phone')}}</span>
              </a>
            </li>
            <li>
              <a href="mailto:{{getConfiguration('site_primary_email')}}">
                <i class="fas fa-envelope icn"><span class="sr-only">icon</span></i>
                <span class="d-lg-inline">{{getConfiguration('site_primary_email')}}</span>
              </a>
            </li>

          </ul>


        </div>

        <div class="col-md-4 col-sm-12 " style="text-align: right;">
          <ul style="float: right;">
            @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
              @if(getConfiguration('facebook_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('facebook_link') }}">
                    <i class="fab fa-facebook-f icn text-center"><span class="sr-only">icon</span></i>
                  </a>
                </li>

              @endif
              @if(getConfiguration('twitter_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('twitter_link') }}">
                    <i class="fab fa-twitter icn text-center"><span class="sr-only">icon</span></i>
                  </a>
                </li>

              @endif
              @if(getConfiguration('googleplus_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('googleplus_link') }}">
                    <i class="fab fa-google-plus icn text-center"><span class="sr-only">icon</span></i>
                  </a>
                </li>

              @endif
              @if(getConfiguration('linkedin_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('linkedin_link') }}">
                    <i class="fab fa-linkedin icn text-center"><span class="sr-only">icon</span></i>
                  </a>
                </li>
              @endif
            @endif

            <li style="margin-right:0">
              <a href="{{ url('storage') . '/' . getConfiguration('catelogue') }}">
                <i class="fas fa-file-pdf"></i> Download Catalogue
              </a>
            </li>
          </ul>

        </div>

      </div>
    </div>
  </div>
  <div class="headerFixer">
    <div class="bg-white">
      <!-- pageHeaderHolder -->
      <div class="container clearfix pageHeaderHolder">
        <!-- logo -->
        <div class="logo alignleft">

          <a href="/">
            <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"/>
          </a>
        </div>
        <!-- pageNavHolder -->
        <div class="pageNavHolder alignright d-flex justify-content-end align-items-md-start" style="right: 0;">

          <!-- pageNav navbar -->
          <nav id="pageNav" class="navbar navbar-expand-lg order-lg-1">
            <!-- pageMainNavOpener -->
            <button class="navbar-toggler pageMainNavOpener" type="button" data-toggle="collapse"
                    data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse"
                    aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- mainNavCollapse navbar collapse -->
            <div class="collapse navbar-collapse mainNavCollapse" id="pageMainNavCollapse">
              <!-- pageMainNavigation navbar nav -->
              @php($url_segment  = Request::segment(1))
              <ul class="navbar-nav pageMainNavigation justify-content-md-end">
                <li class="nav-item {{$url_segment==""?'active':''}}">
                  <a class="nav-link" href="/">Home </a>

                </li>
                <li class="nav-item {{$url_segment=="category"?'active':''}} dropdown">
                  <a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <!-- mainNavDropdown dropdown menu -->
                  <div class="dropdown-menu mainNavDropdown text-uppercase">
                    <!-- navDropdownList -->
                    <ul class="list-unstyled navDropdownList">
                      <?php
                      $categories = \App\Category::latest()->get();
                      ?>
                      @foreach($categories as $category)
                        <li><a class="dropdown-item" href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                      @endforeach

                    </ul>
                  </div>
                </li>
                <li class="nav-item {{$url_segment=="about"?'active':''}}">
                  <a class="nav-link" href="/about"
                     >About us</a>
                </li>
                <li class="nav-item {{$url_segment=="enquiry"?'active':''}}">
                  <a class="nav-link" href="/enquiry"
                     >Enquiry</a>
                </li>
                <li class="nav-item {{$url_segment=="contact"?'active':''}}">
                  <a class="nav-link" href="/contact"
                     >Contact us</a>
                </li>

              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
