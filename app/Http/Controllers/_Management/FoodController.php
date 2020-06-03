<?php

namespace App\Http\Controllers\_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function index()
    {
        return view('management.food.index');
    }
	public function add()
    {
        return view('management.food.add');
    }

}