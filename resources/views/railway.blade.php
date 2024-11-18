<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O‘zbekiston Temir Yo‘llari Xarita</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>O‘zbekiston Temir Yo‘llari Xarita</h1>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([41.3111, 69.2406], 6); // Toshkent markazi

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // JSON faylni yuklash va xaritaga chizish
        fetch('temir_yol.json')  // JSON fayl nomini o'zgartiring
            .then(response => response.json())
            .then(data => {
                data.elements.forEach(element => {
                    if (element.type === 'way') {
                        const coordinates = element.geometry.map(coord => [coord.lat, coord.lon]);
                        L.polyline(coordinates, { color: 'blue', weight: 2 }).addTo(map);
                    }
                });
            })
            .catch(error => console.error("JSON ma'lumotlarni yuklashda xato:", error));
    </script>
</body>
</html>
