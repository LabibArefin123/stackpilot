<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronController extends Controller
{
    public function index()
    {
        return view('backend.cron_page.index');
    }
}
