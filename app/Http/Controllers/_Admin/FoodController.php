<?php

namespace App\Http\Controllers\_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function index()
    {
        return view('superadmin.food.index');
    }
	public function add()
    {
        return view('superadmin.food.add');
    }
	public function edit($id)
    {
        return view('superadmin.food.edit')->with('id',$id);
    }

}