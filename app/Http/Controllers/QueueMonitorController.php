<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueueMonitorController extends Controller
{
    public function index()
    {
        return view('backend.queue_monitor_page.index');
    }
}
