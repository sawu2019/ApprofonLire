<?php

namespace App\Exports;

use App\People;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPeoples implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return People::all();
    }
}
