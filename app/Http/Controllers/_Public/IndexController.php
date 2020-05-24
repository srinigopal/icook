<?php

namespace App\Http\Controllers\_Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show the public (unauthenticated) index page.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        return redirect('/login');
    }
}