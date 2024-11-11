@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report an Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Leaflet CSS for map styling -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body { background-color: #A0DB43; }
        #map { height: 400px; width: 100%; margin-top: 20px; }
    </style>
</head>

<div class="container mt-5">
    <h1>Report an Issue</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('issue_reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo (optional)</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>

        <div id="map"></div> <!-- Map container -->

        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">

        <button type="submit" class="btn btn-primary mt-3">Submit Report</button>
    </form>
</div>

<!-- Map functionality -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    
    const map = L.map('map').setView([13.6210, 123.2008], 10);

    // Add tile layer for the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker; // Define a marker variable outside to reuse it

    // Function to add a marker when clicking on the map
    map.on('click', function(e) {
        const { lat, lng } = e.latlng;
        
        // Update form fields with selected coordinates
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        // Add or update marker on map
        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }
    });

    // Optional: Get user's current location and set map view there
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            const { latitude, longitude } = position.coords;
            map.setView([latitude, longitude], 13); // Zoom in closer
        }, (error) => {
            console.error('Geolocation error:', error);
        });
    } else {
        alert('Geolocation is not supported by your browser.');
    }
</script>
@endsection