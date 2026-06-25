<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    public function index()
    {
        return view('backend.deployment_page.index');
    }
}
