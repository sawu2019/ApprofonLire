<?php

namespace App\Imports;

use App\People;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPeoples implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new People([
            'nom' => $row[0],
            'photo' => $row[1],
            'title' => $row[2],
            'ed_source' => $row[3],
            'int_link' => $row[4],
            'int_sub_categ' => $row[5],
            'int_share_text' => $row[6],
        ]);
    }
}
