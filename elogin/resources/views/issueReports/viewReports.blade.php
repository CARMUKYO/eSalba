@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>about US</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background-color: #A0DB43; /* Set background color */
    }
    </style>
</head>

<div class="container mt-4">
    <h1 class="mb-4">Issue Reports</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Reported By</th>
                    <th>Location</th>
                    <th>Photo</th>
                    <th>Reported At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($issueReports as $report)
                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->user->name }}</td>
                        <td>
                            Latitude: {{ $report->latitude }}<br>
                            Longitude: {{ $report->longitude }}
                        </td>
                        <td>
                            @if($report->photo_path)
                                <img src="{{ asset('storage/' . $report->photo_path) }}" alt="Issue Photo" style="width: 100px; height: auto;">
                            @else
                                No photo provided.
                            @endif
                        </td>
                        <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No issue reports available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
