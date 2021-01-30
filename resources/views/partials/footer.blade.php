<div class="pageFooterAreaWrap position-relative text-center text-sm-left" data-parallax="scroll"
     data-image-src="images/img01.jpg">
  <!-- pageFooterWrapHolder -->
  <div class="container position-relative pageFooterWrapHolder">
    <!-- subscribeAsideBlock -->
    <!-- separator -->
    <hr class="separator">
    <!-- pageFooter -->
    <footer id="pageFooter" class="position-relative">
      <div class="row">
        <div class="col col-12 col-md-9 col-lg-6 order-lg-2">
          <!-- ftLinksNav -->
          <nav class="ftLinksNav">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="text-white">Categories</h3>
                <ul class="list-unstyled">
                  @foreach(\App\Category::all() as $category)
                  <li><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="text-white">Quick Link</h3>
                <ul class="list-unstyled">
                  <li><a href="/home">Home</a></li>
                  <li><a href="/about">About Us</a></li>
                  <li><a href="/enquiry">Enquiry</a></li>
                  <li><a href="/contact">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="col col-12 col-md-3 col-lg-2 order-lg-3 text-center text-md-left">
          <h3 class="text-white">Social</h3>
          <!-- ftSocialLinks -->
          <ul class="list-unstyled socialNetworks ftSocialLinks">
            @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
              @if(getConfiguration('facebook_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('facebook_link') }}">
                    <i class="fab fa-facebook-f icn text-center"><span class="sr-only">icon</span></i><strong
                        class="text font-weight-normal">Facebook</strong>
                  </a>
                </li>

              @endif
              @if(getConfiguration('twitter_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('twitter_link') }}">
                    <i class="fab fa-twitter icn text-center"><span class="sr-only">icon</span></i> <strong
                        class="text font-weight-normal">Twitter</strong>
                  </a>
                </li>

              @endif
              @if(getConfiguration('googleplus_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('googleplus_link') }}">
                    <i class="fab fa-google-plus icn text-center"><span class="sr-only">icon</span></i> <strong
                        class="text font-weight-normal">Google plus</strong>
                  </a>
                </li>

              @endif
              @if(getConfiguration('linkedin_link'))
                <li class="mr-25">
                  <a href="{{ getConfiguration('linkedin_link') }}">
                    <i class="fab fa-linkedin icn text-center"><span class="sr-only">icon</span></i> <strong
                        class="text font-weight-normal">Linkedin</strong>
                  </a>
                </li>
              @endif
            @endif


          </ul>
        </div>
        <div class="col col-12 col-lg-4 order-lg-1 text-center text-lg-left position-static">
          <!-- logo -->
          <div class="logo">
            <a href="/">
              <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"/>
            </a>
          </div>
          <!-- ftAddress -->
          <address class="d-block ftAddress">
            <!-- adrList -->
            <ul class="list-unstyled adrList mb-0">
              <li>
                <i class="fas fa-map-marker-alt flex-shrink-0 icn"><span class="sr-only">icon</span></i>
                <strong class="font-weight-normal text d-block">{{getConfiguration('site_address')}}</strong>
              </li>
              <li>
                <i class="fas fa-phone fa-flip-horizontal flex-shrink-0 icn"><span
                      class="sr-only">icon</span></i>
                <strong class="font-weight-normal text d-block"><a
                      href="tel:{{getConfiguration('site_primary_phone')}}">{{getConfiguration('site_primary_phone')}}</a></strong>
              </li>
              <li>
                <i class="fas fa-envelope flex-shrink-0 icn"><span class="sr-only">icon</span></i>
                <strong class="font-weight-normal text d-block"><a
                      href="mailto:{{getConfiguration('site_primary_email')}}"> {{getConfiguration('site_primary_email')}}</a></strong>
              </li>
            </ul>
          </address>
          <!-- copyrightWrap -->
          <div class="copyrightWrap">
            {{getConfiguration('copyright')}}
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
