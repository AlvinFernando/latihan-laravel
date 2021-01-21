<?php

namespace App\Exports;

use App\Xsiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class XSiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return Xsiswa::all();
    }

    public function map($xsiswa): array{
        return [
            $xsiswa->nama_lengkap(),
            $xsiswa->jk,
            $xsiswa->agama,
            $xsiswa->rataRataNilai(),
        ];
    }

    public function headings(): array
    {
        //Headings
        return [
            'NAMA LENGKAP',
            'JENIS KELAMIN',
            'AGAMA',
            'RATA-RATA NILAI'
        ];
    }
}
