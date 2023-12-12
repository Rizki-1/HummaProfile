@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Cabang Perusahaan</title>
  <link rel="stylesheet" href="{{ asset('cssUser/css/leaflet.css') }}" crossorigin="" />
  <script src="{{ asset('cssUser/js/leaflet.js') }}" crossorigin=""></script>
  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css"
    crossorigin="" />
  <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js" crossorigin=""></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('cabang-perusahaan.index') }}">Cabang Perusahaan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $cabang->name }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('cabang-perusahaan.update', $cabang->id) }}" method="POST">
      @csrf
      @method('put')
      <div class="d-flex justify-content-center align-items-center flex-column">
        <div id="map" style="width: 97.5%; height: 500px;z-index: 1;"></div>
        <div class="row mt-4 mb-4 w-100">
          <div class="col-md-4">
            <label for="unknown" class="form-label">Cabang Perusahaan</label>
            <input required type="text" class="form-control @error('cabang_name') is-invalid @enderror"
              placeholder="Cabang Perusahaan" name="cabang_name" value="{{ old('cabang_name', $cabang->name) }}" required>
            @error('cabang_name')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="latitude" class="form-label">Latitude</label>
            <input required type="text" class="form-control @error('latitude') is-invalid @enderror"
              placeholder="Contoh -7.900074" name="latitude" id="latitude"
              value="{{ old('latitude', $cabang->latitude) }}" required>
            @error('latitude')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="longitude" class="form-label">Longitude</label>
            <input required type="text" class="form-control @error('longitude') is-invalid @enderror"
              placeholder="Contoh 112.606886" name="longitude" id="longitude"
              value="{{ old('longitude', $cabang->longitude) }}" required>
            @error('longitude')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="px-2">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('cabang-perusahaan.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
  <!-- Include Bootstrap CSS -->
  <script>
    const apiKey =
      "AAPKd1f57bfd86514fd59f24f6aca0d9448884U7xkqJAeGXaT01_f2vvcrnXPo4iuG3QNoFDU9Mx32AHdMkwMl5VAn4l_V2hwiL";
    const map = L.map("map").setView([{{ $cabang->latitude }}, {{ $cabang->longitude }}], 7);
    const markerLayer = L.layerGroup().addTo(map);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

    const arcgisOnlineProvider = L.esri.Geocoding.arcgisOnlineProvider({
      apikey: apiKey
    });

    var customIcon = L.icon({
      iconUrl: '{{ asset('cssUser/css/images/marker-icon-2x.png') }}',
      iconSize: [36, 36],
      iconAnchor: [18, 36],
      popupAnchor: [0, -36]
    });

    var cabangPerusahaan = L.marker([{{ $cabang->latitude }}, {{ $cabang->longitude }}], {
      icon: customIcon
    }).addTo(map);

    cabangPerusahaan.bindPopup('<b>{{ $cabang->name }}</b>').openPopup();

    const gisDayProvider = L.esri.Geocoding.featureLayerProvider({
      url: "https://services.arcgis.com/BG6nSlhZSAWtExvp/ArcGIS/rest/services/GIS_Day_Registration_Form_2019_Hosted_View_Layer/FeatureServer/0",
      searchFields: ["event_name", "host_organization"],
      label: "GIS Day Events 2019",
      bufferRadius: 5000,
      formatSuggestion: function(feature) {
        return feature.properties.event_name + " - " + feature.properties.host_organization;
      }
    });

    L.esri.Geocoding.geosearch({
      providers: [arcgisOnlineProvider, gisDayProvider]
    }).addTo(map);

    let isMarkerAdded = false;
    let currentMarker;

    map.on('click', function(e) {
      markerLayer.clearLayers();
      if (currentMarker) {
        currentMarker.remove();
      }

      // Menambahkan marker baru
      $('#latitude').val(e.latlng.lat);
      $('#longitude').val(e.latlng.lng);
      console.log('Latitude:', e.latlng.lat, 'Longitude:', e.latlng.lng);

      currentMarker = L.marker(e.latlng, {
        icon: customIcon
      }).addTo(markerLayer);

      isMarkerAdded = true;
    });
  </script>
@endsection
