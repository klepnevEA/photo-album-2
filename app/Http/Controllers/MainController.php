<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function main()
    {

        return view('main');
    }

    public function login()
    {
        if (auth()->check()) {
            return redirect()->guest('/');
        }

        return view('login');
    }

    public function development()
    {
        return view('pages.development');
    }

    public function developmentJs()
    {
        return view('pages.development-js');
    }
}
