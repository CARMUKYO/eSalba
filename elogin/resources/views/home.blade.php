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
        align-items: center; 
        justify-content: space-between; 
        height: 100vh; 
        padding: 0 5%; 
    }
    .hero-text {
        max-width: 600px; 
    }
    .hero-text h1 {
        font-size: 4rem; 
        font-weight: bold; 
    }
    .hero-text p {
        font-size: 1.5rem;
        margin-bottom: 30px; 
    }
    .btn-custom {
        background-color: #A0DB43; 
        color: white; 
        padding: 10px 30px; 
        border: none; 
        border-radius: 5px; 
        font-size: 1.25rem; 
    }
    .btn-custom:hover {
        background-color: #8cdb3d; 
    }
    .hero-image {
        max-width: 50%;
        height: auto; 
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

</body>
</html>

@endsection
