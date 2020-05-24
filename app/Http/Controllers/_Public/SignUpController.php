<?php

namespace App\Http\Controllers\_Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            return view('_public.auth.already-signed-up');
        } else {
            return view('_public.auth.signup');
        }

    }
}