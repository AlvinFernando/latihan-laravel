<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\XSiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Xsiswa;


class XsiswaController extends Controller
{
    //mengambil dari folder xsiswa.file index di folder view
    public function index(Request $request){
        if($request->has('cari')){
            $data_xsiswa = \App\Xsiswa::where('nama_depan','LIKE', '%'.$request->cari.'%')->get();
        }else{
            $data_xsiswa = \App\Xsiswa::all();// variabel data xsiswa harus dilempar ke view
        }
        
        return view('xsiswa.index',['data_xsiswa' => $data_xsiswa]);
    }

    public function create(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jk' => 'required',
            'agama' =>'required',
            'avatar' => 'mimes:jpg,png'
        ]);


        //insert ke table user
        $user = new \App\User;
        $user->role = 'xsiswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();


        //insert ke table siswa
        $request->request->add([ 'user_id' => $user->id ]);
        $xsiswa = Xsiswa::create($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $xsiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $xsiswa->save(); 
        }
        return redirect('xsiswa')->with('sukses','Data Berhasil Diinputkan !!');
    }

    public function edit(Xsiswa $xsiswa){
        return view('xsiswa/edit',['xsiswa' => $xsiswa]);
    }

    public function update(Request $request, Xsiswa $xsiswa){
        //dd($request->all());
        $xsiswa -> update($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $xsiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $xsiswa->save(); 
        }
        return redirect('xsiswa')->with('sukses','Data Berhasil Diubah !!');
    }

    public function delete(Xsiswa $xsiswa){
        $xsiswa -> delete($xsiswa);
        return redirect('xsiswa')->with('sukses','Data Berhasil Dihapus !!');
    }

    public function profile(Xsiswa $xsiswa){
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
            'xdata' => $xdata]);
    }

    //input nilai
    public function addnilai(Request $request, $idsiswa){
        //dd($request->all());
        $xsiswa = Xsiswa::find($idsiswa);
        if($xsiswa->xmapel()->where('xmapel_id', $request->xmapel)->exists()){
            return redirect('xsiswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada !!');
        }
        $xsiswa->xmapel()->attach($request->xmapel, ['nilai' => $request->nilai]);

        return redirect('xsiswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhail dimasukkan !!');
    }

    public function deletenilai($idsiswa, $idmapel){
        
        $xsiswa -> xmapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai Berhasil Dihapus !!');
    }

    public function exportExcel() {
        return Excel::download(new XSiswaExport, 'xsiswa.xlsx');
    }

    public function exportPDF() {
        $xsiswa = Xsiswa::all();
        $pdf = PDF::loadView('export.xsiswapdf', ['xsiswa' => $xsiswa]); 
        return $pdf->download('xsiswa.pdf');
    }
}
