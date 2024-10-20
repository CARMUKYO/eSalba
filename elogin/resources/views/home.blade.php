@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background-color: #A0DB43; /* Set background color */
    }
    .hero-section {
        display: flex;
        align-items: center; /* Center vertically */
        justify-content: space-between; /* Space out elements */
        height: 100vh; /* Full viewport height */
        padding: 0 5%; /* Add some horizontal padding */
    }
    .hero-text {
        max-width: 600px; /* Limit width of text */
    }
    .hero-text h1 {
        font-size: 4rem; /* Increase font size for heading */
        font-weight: bold; /* Make heading bold */
    }
    .hero-text p {
        font-size: 1.5rem; /* Font size for paragraph */
        margin-bottom: 30px; /* Space below paragraph */
    }
    .btn-custom {
        background-color: #A0DB43; /* Button background color */
        color: white; /* Button text color */
        padding: 10px 30px; /* Button padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        font-size: 1.25rem; /* Button font size */
    }
    .btn-custom:hover {
        background-color: #8cdb3d; /* Darker shade on hover */
    }
    .hero-image {
        max-width: 50%; /* Limit image width */
        height: auto; /* Maintain aspect ratio */
    }
</style>
</head>

<body>
<div class="hero-section">
    <div class="hero-text">
        <h1>ESALBA</h1>
        <p>Report, Connect, Act: Preserve Our Environment.</p>
        <a href="{{ route('register') }}" class="btn btn-custom">Sign Up</a>
        <a href="#" class="btn btn-dark" style="margin-left: 20px;">GET STARTED</a>
        <p>Let’s See How It Works</p>
        <p>20% Increase Community Awareness</p>
    </div>
    <img src="https://via.placeholder.com/400" alt="Recent Reports" class="hero-image"> 
</div>

<div class="container mt-5">
    <h2>MOST RECENT REPORTS</h2>
    <img src="https://via.placeholder.com/600" alt="Most Recent Reports" class="img-fluid"> <!-- Placeholder for recent reports -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

@endsection
