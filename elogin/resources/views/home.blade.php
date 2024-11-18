@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Environmental Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: #E4E4FF;
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 85vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .features {
            background-color: #f9f9f9;
            padding: 50px 0;
        }
        .cta {
            padding: 40px 0;
            text-align: center;
        }
        .cta h3 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="hero mt-5">
        <h1 class="display-4">Protect Our Planet</h1>
        <p class="lead">Track, report, and resolve environmental issues in your community.</p>
        <a href="{{ route('report-issue') }}" class="btn btn-dark btn-lg">Report an issue?</a>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">About Us</h2>
        <p class="text-center">Our mission is to empower individuals and communities to take action for the environment. By providing a platform to report and visualize environmental issues, we help raise awareness and inspire solutions.</p>
    </div>

    <div class="features">
        <div class="container">
            <h2 class="text-center mb-5">Features</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="bi bi-map" style="font-size: 3rem; color: #A0DB43;"></i>
                    <h4 class="mt-3">Interactive Map</h4>
                    <p>Visualize reported issues on an intuitive map interface.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-chat-square-text" style="font-size: 3rem; color: #A0DB43;"></i>
                    <h4 class="mt-3">Easy Reporting</h4>
                    <p>Report environmental issues with photos and descriptions.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-check-circle" style="font-size: 3rem; color: #A0DB43;"></i>
                    <h4 class="mt-3">Track Progress</h4>
                    <p>Monitor the status of reported issues and their resolution.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="cta">
        <h3>Ready to Make a Difference?</h3>
        <a href="{{ route('issue_reports.index') }}" class="btn btn-light btn-lg">View Reported Issues</a>
    </div>
</body>
@php
    $showFooter = true;
@endphp

@endsection
