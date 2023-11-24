<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauthenticate');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
}
