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
            <li class="breadcrumb-item active" aria-current="page">Enquiry</li>
          </ol>
        </div>
      </div>
    </div>
  </nav>
  @livewire('partials.enquiry-form')
  <!-- ctMapHolder -->
  <div class="ctMapHolder position-relative ">
    <!-- map -->
    <div class="container">
      <div id="mapid" wire:ignore style="width: 100%; height: 400px;"></div>
    </div>

  </div>
@endsection

@push("scripts")
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script>

    var mymap = L.map('mapid').setView([{{getConfiguration('latitude')}},{{getConfiguration('longitude')}} ], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(mymap);

    L.marker([{{getConfiguration('latitude')}},{{getConfiguration('longitude')}}]).addTo(mymap)
      .bindPopup("<b>{{getConfiguration('marker_title')}}</b><br /> {{getConfiguration('marker_description')}}").openPopup();


    var popup = L.popup();

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
    }

    mymap.on('click', onMapClick);

  </script>
@endpush
