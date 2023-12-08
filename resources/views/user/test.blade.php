<html>

<head>
    <meta charset="utf-8" />
    <title>Search for feature layer data (feature service)</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css"
        crossorigin="" />
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js" crossorigin=""></script>
    <style>
        html,
        body,
        #map {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #323232;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        const apiKey = "AAPKd1f57bfd86514fd59f24f6aca0d9448884U7xkqJAeGXaT01_f2vvcrnXPo4iuG3QNoFDU9Mx32AHdMkwMl5VAn4l_V2hwiL";
        const map = L.map("map").setView([-7.900074, 112.606886], 7);
        const markerLayer = L.layerGroup().addTo(map); // LayerGroup untuk menyimpan marker

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const arcgisOnlineProvider = L.esri.Geocoding.arcgisOnlineProvider({
            apikey: apiKey
        });

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

        let isMarkerAdded = false; // Variabel untuk melacak apakah marker sudah ditambahkan

        // Menambahkan event listener untuk menangkap klik pada peta
        map.on('click', function(e) {
            // Menghapus marker yang sudah ada jika sudah ditambahkan sebelumnya
            if (isMarkerAdded) {
                markerLayer.clearLayers();
            }

            // Menampilkan latitude dan longitude pada console untuk debug
            console.log('Latitude:', e.latlng.lat, 'Longitude:', e.latlng.lng);

            // Menambahkan marker pada lokasi klik
            L.marker(e.latlng).addTo(markerLayer);
            isMarkerAdded = true; // Mengubah status menjadi marker sudah ditambahkan
        });
    </script>

</body>

</html>
