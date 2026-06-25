<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptimizationController extends Controller
{
    public function index()
    {
        return view('backend.optimize_page.index');
    }
}
