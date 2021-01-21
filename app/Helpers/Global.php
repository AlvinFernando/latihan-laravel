<?php
use App\Xsiswa;
use App\Xguru;


function ranking5Besar(){
    $xsiswa = Xsiswa::all();
    $xsiswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $xsiswa = $xsiswa->sortByDesc('rataRataNilai')->take(5);
    return $xsiswa;
}

function totalSiswa(){
    return Xsiswa::count();
}

function totalGuru(){
    return Xguru::count();
}