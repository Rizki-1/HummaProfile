<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OpenStreetMap Example with Markers</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map { height: 400px; }
  </style>
</head>
<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  var map = L.map('map').setView([-7.900074,112.606886], 7);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Koordinat kantor pusat
  var kantorPusat = L.marker([-7.900074,112.606886]).addTo(map);
  kantorPusat.bindPopup('<b>Kantor Pusat</b>').openPopup();

  // Koordinat cabang 1
  var cabang1 = L.marker([-7.5570422,111.6597938]).addTo(map);
  cabang1.bindPopup('<b>Cabang 1</b>');

  // Koordinat cabang 2
  var cabang2 = L.marker([-7.5573993,111.5791793]).addTo(map);
  cabang2.bindPopup('<b>Cabang 2</b>');
</script>

</body>
</html>
