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

    public function xmapel(){
        return $this->belongsToMany(Xmapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
}
