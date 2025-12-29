<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();

        return view('dashboard', compact('movies'));
    }
}
