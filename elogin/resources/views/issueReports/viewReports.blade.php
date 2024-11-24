@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Issue Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #E4E4FF;
        }
        table.table td, table.table th {
            text-align: center;       
            vertical-align: middle;  
        }
        table.table td img {
            display: block;           
            margin-left: auto;        
            margin-right: auto;       
            max-width: 100px;         
            height: auto;             
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
                    <th>Status</th>
                    <th>Photo</th>
                    <th>Reported At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($issueReports as $report)
                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->user->name }}</td>
                        <td>
                            <a href="{{ route('map.view', ['lat' => $report->latitude, 'lng' => $report->longitude, 'zoom' => 18]) }}" target="_blank">View on Map</a>
                        </td>
                        <td>{{ $report->status }}</td>
                        <td>
                            @if($report->photo_path)
                                <img src="{{ asset('storage/' . $report->photo_path) }}" alt="Issue Photo" style="width: 100px; height: auto;">
                            @else
                                No photo provided.
                            @endif
                        </td>
                        <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            @if(auth()->id() === $report->user_id)
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $report->id }}">Edit</button>
                                
                                <form action="{{ route('issue_reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>

                    <!-- Edit -->
                    <div class="modal fade" id="editModal-{{ $report->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $report->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $report->id }}">Edit Report</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('issue_reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="title-{{ $report->id }}" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title-{{ $report->id }}" name="title" value="{{ $report->title }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description-{{ $report->id }}" class="form-label">Description</label>
                                            <textarea class="form-control" id="description-{{ $report->id }}" name="description" rows="4" required>{{ $report->description }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status-{{ $report->id }}" class="form-label">Status</label>
                                            <select class="form-select" id="status-{{ $report->id }}" name="status" required>
                                                <option value="Pending" {{ $report->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="In Progress" {{ $report->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="Resolved" {{ $report->status === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="photo-{{ $report->id }}" class="form-label">Photo (optional)</label>
                                            <input type="file" class="form-control" id="photo-{{ $report->id }}" name="photo" accept="image/*">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No issue reports available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+1weuPRKkzcxMx2xZ9fK9cqNl2iWF" crossorigin="anonymous"></script>
@endsection
