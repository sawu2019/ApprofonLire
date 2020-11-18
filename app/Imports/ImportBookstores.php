<?php

namespace App\Imports;

use App\Bookstore;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBookstores implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bookstore([
            'nom' => $row[0],
            'complement' => $row[1],
            'adresse' => $row[2],
            'ville' => $row[3],
            'latitude' => $row[4],
            'longitude' => $row[5],
            'coordinates' => $row[6],
            'code_insee' => $row[7],
            'adresse_complet' => $row[8],
            'siret' => $row[9],
            'mail' => $row[10],
            'telephone' => $row[11],
            'site' => $row[12],
            'nom_city_ver' => $row[13],
        ]);
    }
}
