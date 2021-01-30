@section('content')

  <!-- pageBdWrapNav -->
  <nav class="pageBdWrapNav bg-light" aria-label="breadcrumb">
    <div class="container">
      <div class="row align-items-md-center">
        <div class="col-12 col-md-7">
          <!-- breadcrumb -->
          <ol class="breadcrumb pageBreadcrumb m-0 p-0 text-capitalize">
            <li class="breadcrumb-item">
              <a href="/">
                <i class="fas fa-home icn"><span class="sr-only">icon</span></i>
                Home
              </a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">page</a></li>
            <li class="breadcrumb-item active" aria-current="page">about us</li>
          </ol>
        </div>
        <div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
          <!-- title -->
          <strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">about us</strong>
        </div>
      </div>
    </div>
  </nav>
  <!-- abtIntroAsideBlock -->
  <aside class="abtIntroAsideBlock contentBlock">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
          <!-- headingHead -->
          <header class="headingHead">
            <!-- blockH -->
            <h2 class="text-uppercase blockH font-weight-bold mb-0">
              <!-- hTitle -->
              <strong class="font-weight-normal hTitle d-block fontBase">About</strong>
              <span class="d-block">we have over 20 years experience</span>
            </h2>
          </header>
        </div>
        <div class="col-12 col-md-8">
          <p style="white-space: pre-wrap;">
            {{getConfiguration('about_description')}}
          </p>
        </div>
      </div>
      <!-- featuresList -->
    </div>
  </aside>
  <div class="container">
    <!-- separatorDefault -->
    <hr class="d-block separatorDefault mt-0 mb-0">
  </div>
  <!-- wcuBlock -->
  <section class="wcuBlock contentBlock">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7 order-md-2">
          <div class="extraWrap pl-xl-5">
            <!-- headingHead -->
            <header class="headingHead">
              <!-- blockH -->
              <h2 class="text-uppercase blockH font-weight-bold">
                <!-- hTitle -->
                <span class="d-block">Message from CEO</span>
              </h2>
              <p style="white-space: pre-wrap;">
                {{getConfiguration('ceo_message')}}
              </p>
            </header>

          </div>
        </div>
        <div class="col-12 d-none d-md-block col-md-5 order-md-1">
          <!-- wcuBlockImageHolder -->
          <div class="">
            <img class="rounded" alt="logo" src="{{ url('storage') . '/' . getConfiguration('ceo_image') }}"/>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contentBlock otwBlock text-center">
    <div class="container">
      <div class="row">
        <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8">
          <!-- headingHead -->
          <header class="headingHead">
            <!-- blockH -->
            <h2 class="text-uppercase blockH font-weight-bold">
              <!-- hTitle -->
              <strong class="font-weight-normal hTitle d-block fontBase">Our Team</strong>
              <span class="d-block">work with us</span>
            </h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
          </header>
        </div>
      </div>
      <div class="row">
        @foreach($team as $member)
          <div class="col-12 col-sm-6 col-lg-3 ">
            <!-- teamColumn -->
            <article class="teamColumn hasOver position-relative rounded">
              <!-- imgHolder -->
              <div class="aligncenter imgHolder">
                <img class="d-block w-100" src="{{ optional($member->getImage())->url }}" alt="Brandon Kelley Interior Design">
              </div>
              <!-- captionWrap -->
              <div class="captionWrap">
                <h3 class="text-capitalize"><a href="#">{{$member->name}}</a></h3>
                <h4 class="fontBase font-weight-normal text-capitalize">{{$member->designation}}</h4>
                <!-- tcSocialNetworks -->
                <ul class="list-unstyled socialNetworks d-flex justify-content-center tcSocialNetworks mb-0">
                  <li>
                    <a href="{{$member->facebook_link}}"
                       class="d-flex align-items-center justify-content-center rounded-circle">
                      <i class="fab fa-facebook-f icn text-center"><span class="sr-only">icon</span></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$member->twitter_link}}"
                       class="d-flex align-items-center justify-content-center rounded-circle">
                      <i class="fab fa-twitter icn text-center"><span class="sr-only">icon</span></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$member->googleplus_link}}"
                       class="d-flex align-items-center justify-content-center rounded-circle">
                      <i class="fab fa-google-plus icn text-center"><span class="sr-only">icon</span></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$member->linkedin_link}}"
                       class="d-flex align-items-center justify-content-center rounded-circle">
                      <i class="fab fa-linkedin icn text-center"><span class="sr-only">icon</span></i>
                    </a>
                  </li>
                </ul>
              </div>
            </article>
          </div>
        @endforeach

      </div>
    </div>
  </section>
@endsection
