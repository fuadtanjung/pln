<?php

namespace App\Exports;

use App\DetailPengaduanJaringan;
use App\DetailPengecekanJaringan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengecekanjaringanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailPengecekanJaringan::all();
    }
}
