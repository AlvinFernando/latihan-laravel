<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xmapel extends Model
{
    //
    protected $table = 'xmapel';
    protected $fillable = ['kode','nama','semester'];

    public function xsiswa(){
        return $this->belongsToMany(Xsiswa::class)->withPivot(['nilai']);
    }

}
