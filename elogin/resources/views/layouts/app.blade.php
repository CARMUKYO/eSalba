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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .nav-link.active {
            font-weight: bold;
            color: #007bff;
            font-size: 1.2rem;
            text-transform: uppercase; 
        }
        nav{
            background-color: #306844;
        }
        .nav-link {
            transition: font-size 0.3s ease, color 0.3s ease;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            position: relative;
            bottom: 0;
        }
        footer a {
            color: #A0DB43;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="custom-bg"> 
<nav class="navbar navbar-expand-lg"> 
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="padding: 12px 20px; font-size: 20px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" style="padding: 12px 20px; font-size: 20px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('map') ? 'active' : '' }}" href="{{ url('/map') }}" style="padding: 12px 20px; font-size: 20px;">Maps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('reports') ? 'active' : '' }}" href="{{ url('/reports') }}" style="padding: 12px 20px; font-size: 20px;">Dropdown</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('issue-reports') ? 'active' : '' }}" href="{{ route('issue_reports.index') }}" style="padding: 12px 20px; font-size: 20px;">Reports</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn nav-link" style="border: none; background: none; padding: 12px 20px; font-size: 20px;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}" style="padding: 12px 20px; font-size: 20px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}" style="padding: 12px 20px; font-size: 20px;">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

@if (isset($showFooter) && $showFooter)
    <footer>
        <p>Contact us on:</p>
        <a href="https://gmail.com" target="_blank" aria-label="Visit our Twitter page">Gmail</a>
        <p>&copy; {{ date('Y') }} Esalba Environmental Tracker. All rights reserved.</p>
    </footer>
@endif
</body>
</html>
