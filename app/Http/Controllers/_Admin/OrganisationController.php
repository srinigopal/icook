<?php

namespace App\Http\Controllers\_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationController extends Controller
{

    public function index()
    {
        return view('superadmin.organisation.index');
    }
	public function add()
    {
        return view('superadmin.organisation.add');
    }
	public function edit($id)
    {
        return view('superadmin.organisation.edit')->with('id',$id);
    }
}