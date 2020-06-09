<?php

namespace App\Http\Controllers\_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuisineController extends Controller
{

    public function index()
    {
        return view('superadmin.cuisine.index');
    }
	public function add()
    {
        return view('superadmin.cuisine.add');
    }
	public function edit($id)
    {
        return view('superadmin.cuisine.edit')->with('id',$id);
    }
}