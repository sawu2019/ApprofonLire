<?php

namespace App\Exports;

use App\Bookstore;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportBookstores implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bookstore::all();
    }
}
