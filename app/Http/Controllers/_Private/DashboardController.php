<?php

namespace App\Http\Controllers\_Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('_private.dashboard.index');
    }
}