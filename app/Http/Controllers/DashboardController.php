<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::with('sentences')->get();
        return view('admin.dashboard.index', compact('projects'));
    }
}
