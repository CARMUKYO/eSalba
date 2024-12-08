<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssueReport;

class MapController extends Controller
{
    public function index(Request $request)
{
    // Get latitude, longitude, and zoom level from query parameters
    $latitude = $request->query('lat', 13.6210); // Default latitude
    $longitude = $request->query('lng', 123.2008); // Default longitude
    $zoom = $request->query('zoom', 11); // Default zoom level

    // Fetch all issue reports to display their markers
    $issueReports = IssueReport::select('id', 'title', 'description', 'latitude', 'longitude', 'photo_path')->get();

    return view('issueReports.map', compact('latitude', 'longitude', 'zoom', 'issueReports'));
}

}
