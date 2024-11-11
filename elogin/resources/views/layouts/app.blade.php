<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>
    <style>
        /* Style for the active page in the navbar */
        .nav-link.active {
            font-weight: bold;
            color: #007bff; /* Highlight color */
            font-size: 1.2rem; /* Make the font size bigger */
            text-transform: uppercase; /* Optional: Uppercase the text */
        }

        /* Optional: A smooth transition when switching active links */
        .nav-link {
            transition: font-size 0.3s ease, color 0.3s ease;
        }
    </style>
</head>
<body class="custom-bg"> 
    <nav class="navbar navbar-expand-lg"> 
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('map') ? 'active' : '' }}" href="{{ url('/map') }}">Maps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('reports') ? 'active' : '' }}" href="{{ url('/reports') }}">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('issue_reports') ? 'active' : '' }}" href="{{ route('issue_reports.index') }}">Current Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('community') ? 'active' : '' }}" href="{{ url('/community') }}">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}" href="{{ url('/contact-us') }}">Contact Us</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn nav-link" style="border: none; background: none;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
