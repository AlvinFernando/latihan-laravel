<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xpost;

class XpostController extends Controller
{
    //
    public function index(){
        $xposts = Xpost::all();
        return view('xposts.index', compact(['xposts']));
    }

    public function add(){
        return view('xposts.add');
    }

    public function create(Request $request){
        dd($request->all());
        $xpost = Xpost::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect()->route('xposts.index')->with('sukses','Post Berhasil !!');
    }
}
