<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function editnilai(Request $request, $id){
        $xsiswa = \App\Xsiswa::find($id);
        $xsiswa->xmapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
