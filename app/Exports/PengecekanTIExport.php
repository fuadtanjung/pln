<?php

namespace App\Exports;

use App\DetailAsetTi;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengecekanTIExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailAsetTi::all();
    }
}
