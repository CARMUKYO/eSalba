<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssueReport;
use Illuminate\Support\Facades\Log;

class IssueReportController extends Controller
{
    public function create()
    {
        return view('issueReports.reports');
    }

    public function index()
    {
        $issueReports = IssueReport::all(); 
        return view('issueReports.viewReports', compact('issueReports'));
    }

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all()); 

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            Log::info('Photo upload detected.');
            $photoPath = $request->file('photo')->store('issue_photos', 'public');
            Log::info('Photo stored at:', ['path' => $photoPath]);
        } else {
            Log::info('No photo uploaded.');
        }

        try {
            $issue = IssueReport::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'description' => $request->description,
                'photo_path' => $photoPath,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            Log::info('Issue report saved successfully.', ['issue_id' => $issue->id]);
        } catch (\Exception $e) {
            Log::error('Error saving issue report:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('An error occurred while saving the report. Please try again.');
        }

        return redirect()->route('issue_reports.index')->with('success', 'Issue report submitted successfully.');
    }

    public function map()
    {
        $issueReports = IssueReport::select('id', 'title', 'description', 'latitude', 'longitude', 'photo_path')
            ->get(); 
        return view('issueReports.map', compact('issueReports'));
    }

    public function edit(IssueReport $report)
    {
        if ($report->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('issueReports.edit', compact('report'));
    }

    public function update(Request $request, IssueReport $report)
    {
        if ($report->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $report->photo_path;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('issue_photos', 'public');
        }

        $report->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('issue_reports.index')->with('success', 'Issue report updated successfully.');
    }

    public function destroy(IssueReport $issueReport)
    {
        if (auth()->id() !== $issueReport->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $issueReport->delete();

        return redirect()->route('issue_reports.index')->with('success', 'Report deleted successfully.');
    }
    }
