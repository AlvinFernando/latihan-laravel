<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xsiswa;
class DashboardController extends Controller
{
    //
    public function index(){
        
        //dd($xsiswa);
        return view('dashboards.index');
    }
}
