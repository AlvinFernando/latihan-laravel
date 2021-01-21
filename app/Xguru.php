<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xguru extends Model
{
    //
    protected $table = 'xguru';
    protected $fillable = ['nama','telpon','alamat'];




    public function xmapel(){
        return $this->hasMany(Xmapel::class);
    }
}
