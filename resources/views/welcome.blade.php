<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O‘zbekiston Temir Yo'llari Xarita</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px; /* Xarita balandligi */
            width: 100%;   /* Xarita kengligi */
        }
    </style>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map('map').setView([41.3775, 64.5854], 5); // O‘zbekiston markazi bo'yicha joylashuv

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Overpass API dan O‘zbekiston temir yo'l ma'lumotlarini olish
            fetch('https://overpass-api.de/api/interpreter?data=[out:json];way["railway"="rail"](41.0,60.0,43.0,68.0);out;')
            .then(response => response.json())
            .then(data => {
                data.elements.forEach(element => {
                    if (element.type === "way") {
                        var latlngs = element.geometry.map(function(coord) {
                            return [coord.lat, coord.lon];
                        });
                        L.polyline(latlngs, {color: 'blue', weight: 3}).addTo(map); // Temir yo'l chiziqlari
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>O‘zbekiston Temir Yo'llari Xarita</h1>
    <div id="map"></div>
</body>
</html>
