<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function privacy()
    {
        return view('privacy');
    }

    public function dmca()
    {
        return view('dmca');
    }

    public function aboutus()
    {
        return view('aboutus');
    }
}
