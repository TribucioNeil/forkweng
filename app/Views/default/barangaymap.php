<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaflet Map Search</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    /* Set HTML and body height to 100% to fill the entire screen */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    /* Set map container to fill the entire screen */
    #map {
      height: 100%;
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    <?php
      // Assuming $lat and $lng are already defined somewhere in your PHP code
      $lat = isset($lat) ? $lat : 0;
      $lng = isset($lng) ? $lng : 0;
    ?>

    var map = L.map('map').setView([<?= $lat ?>, <?= $lng ?>], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([<?= $lat ?>, <?= $lng ?>]).addTo(map)
        .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        .openPopup();
  </script>
</body>
</html>