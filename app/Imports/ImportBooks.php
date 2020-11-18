<?php

namespace App\Imports;

use App\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBooks implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'nom' => $row[0],
            'photo' => $row[1],
            'auteur' => $row[2],
            'editeur' => $row[3],
            'purch_link' => $row[4],
            'notes' => $row[5],
            'sharetext' => $row[6],
        ]);
    }
}
