<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $xsiswa = \App\Xsiswa::create($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $xsiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $xsiswa->save(); 
        }
        return redirect('xsiswa')->with('sukses','Data Berhasil Diinputkan !!');
    }

    public function edit($id){
        $xsiswa = \App\Xsiswa::find($id);
        return view('xsiswa/edit',['xsiswa' => $xsiswa]);
    }

    public function update(Request $request, $id){
        //dd($request->all());
        $xsiswa = \App\Xsiswa::find($id);
        $xsiswa -> update($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $xsiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $xsiswa->save(); 
        }
        return redirect('xsiswa')->with('sukses','Data Berhasil Diubah !!');
    }

    public function delete($id){
        $xsiswa = \App\Xsiswa::find($id);
        $xsiswa -> delete($xsiswa);
        return redirect('xsiswa')->with('sukses','Data Berhasil Dihapus !!');
    }

    public function profile($id){
        $xsiswa = \App\Xsiswa::find($id);
        $xmatapelajaran = \App\Xmapel::all();
        //dd($xmapel);

        //Menyiapkan Data Untuk Chart
        $xcategories = [];
        $xdata = [];
        
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

    public function addnilai(Request $request, $idsiswa){
        //dd($request->all());
        $xsiswa = \App\Xsiswa::find($idsiswa);
        if($xsiswa->xmapel()->where('xmapel_id', $request->xmapel)->exists()){
            return redirect('xsiswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada !!');
        }
        $xsiswa->xmapel()->attach($request->xmapel, ['nilai' => $request->nilai]);

        return redirect('xsiswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhail dimasukkan !!');
    }

    public function deletenilai($idsiswa, $idmapel){
        $xsiswa = \App\Xsiswa::find($idsiswa);
        $xsiswa -> xmapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai Berhasil Dihapus !!');
    }
}
