<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueReportController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/reports', function () {
    return view('issueReports/reports'); 
})->name('report-issue'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/issue-reports/create', [IssueReportController::class, 'create'])->name('issue_reports.create');
    Route::post('/issue-reports', [IssueReportController::class, 'store'])->name('issue_reports.store');
    Route::put('/issue-reports/{report}', [IssueReportController::class, 'update'])->name('issue_reports.update');
    Route::delete('/issue-reports/{issueReport}', [IssueReportController::class, 'destroy'])->name('issue_reports.destroy');
});

Route::get('/issue-reports', [IssueReportController::class, 'index'])->name('issue_reports.index');

Route::get('/map', [IssueReportController::class, 'map'])->name('issue_reports.map');

// Include the authentication routes
require __DIR__.'/auth.php';
