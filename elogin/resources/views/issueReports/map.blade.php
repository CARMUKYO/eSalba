@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Environmental Issues Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body {
            background-color: #A0DB43;
        }
        #map {
            height: 750px;
            width: 100%;
        }
    </style>
</head>

<body>
<div class="container mt-4">
    <h1>INTERACTIVE ISSUE MAP</h1>
    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([13.6210, 123.2008], 10);

    // Set up the tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const issueReports = @json($issueReports ?? []);

    // Add markers for each issue report
    issueReports.forEach(issue => {
        if (issue.latitude && issue.longitude) {
            const marker = L.marker([issue.latitude, issue.longitude]).addTo(map);

            let popupContent = `<h5>${issue.title}</h5><p>${issue.description}</p>`;
            if (issue.photo_path) {
                popupContent += `<img src="/storage/${issue.photo_path}" alt="Issue photo" style="width:100%; height:auto;">`;
            }

            marker.bindPopup(popupContent);
        }
    });
</script>
</body>
@endsection
