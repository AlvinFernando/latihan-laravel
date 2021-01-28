<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xsiswa;
use App\Xpost;

class XSiteController extends Controller
{
    public function home(){
        $xposts = Xpost::all();
        return view('xsites.home', compact(['xposts']));
    }

    public function about(){
        return view('xsites.about');
    }

    public function register(){
        return view('xsites.register');
    }

    public function postregister(Request $request){
        //dd($request->all());

        $user = new \App\User;
        $user->role = 'xsiswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->epassword);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add([ 'user_id' => $user->id ]);
        $xsiswa = Xsiswa::create($request->all());

        return redirect('')->with('sukses','Data Pendaftaran Telah Berhasil');
    }

    public function singlexpost($slug){
        $xpost = Xpost::where('slug', '=' , $slug)->first();
        //dd($xpost);
        return view('xsites.singlexpost', compact(['xpost']));
    }


}
