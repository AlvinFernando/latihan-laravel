<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xmapel extends Model
{
    //
    protected $table = 'xmapel';
    protected $fillable = ['kode','nama','semester'];


    //Many to Many
    public function xsiswa(){
        return $this->belongsToMany(Xsiswa::class)->withPivot(['nilai']);
    }


    public function xguru(){
        return $this->belongsTo(Xguru::class);
    }

}
