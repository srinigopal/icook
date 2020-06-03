<?php

namespace App\Http\Controllers\_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show the private index page.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        return view('_admin.index');
    }
}