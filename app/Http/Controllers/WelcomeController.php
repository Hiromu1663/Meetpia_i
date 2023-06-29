<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class WelcomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('hot', 'desc')->take(3)->get();
        // dd($projects);

        return view('welcome.welcome-index', compact('projects'));
    }
}
