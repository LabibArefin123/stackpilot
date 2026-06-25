<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerHealthController extends Controller
{
    public function index()
    {
        return view('backend.server_health.index');
    }
}
