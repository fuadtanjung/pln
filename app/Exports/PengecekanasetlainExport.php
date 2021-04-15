<?php

namespace App\Exports;

use App\DetailAsetLain;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengecekanasetlainExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailAsetLain::all();
    }
}
