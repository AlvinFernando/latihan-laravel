<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xguru;


class XguruController extends Controller
{
    
    public function profile($id){
        $xguru = \App\Xguru::find($id);
        return view('xguru.profile',['xguru' => $xguru]);
        /*
        
        $xmatapelajaran = \App\Xmapel::all();
        //dd($xmapel);

        //Menyiapkan Data Untuk Chart
        $xcategories = [];
        $xdata = [];
        
        //menampilkan penambahan data
        foreach($xmatapelajaran as $xmp) {
            if($xsiswa->xmapel()->wherePivot('xmapel_id', $xmp->id)->first()){
                $xcategories[] = $xmp->nama;
                $xdata[] = $xsiswa->xmapel()->wherePivot('xmapel_id', $xmp->id)->first()->pivot->nilai;
            }
        }

        //dd($xdata);
        return view('xsiswa.profile',[
            'xsiswa' => $xsiswa, 
            'xmatapelajaran' => $xmatapelajaran,
            'xcategories' => $xcategories,
            'xdata' => $xdata]);*/
    }
}
