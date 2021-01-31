@section('content')


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

@endsection
