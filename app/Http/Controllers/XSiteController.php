<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class XSiteController extends Controller
{
    public function home(){
        return view('xsites.home');
    }

    public function about(){
        return view('xsites.about');
    }
}
