<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xsiswa extends Model
{
    //
    protected $table = 'xsiswa';
    protected $fillable = ['nama_depan','nama_belakang','jk','agama','alamat','avatar','user_id'];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default.png');
        } 
        
        return asset('images/'.$this->avatar);
    }

    //Many to Many
    public function xmapel(){
        return $this->belongsToMany(Xmapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai(){
        //ambil nilai2
        $total = 0;
        $hitung = 0;
        if($this->xmapel->isNotEmpty()){
            foreach($this->xmapel as $xmapel){
                $total += $xmapel->pivot->nilai;
                $hitung++;
            }     
        }return $total != 0 ? round($total/$hitung) : $total;
    }

    //menyambungkan nama depan dengan nama belakang
    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
