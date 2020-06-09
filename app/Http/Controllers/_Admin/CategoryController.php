<?php

namespace App\Http\Controllers\_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        return view('superadmin.category.index');
    }
	public function add()
    {
        return view('superadmin.category.add');
    }
	public function edit($id)
		{
			return view('superadmin.category.edit')->with('id',$id);
		}
	}