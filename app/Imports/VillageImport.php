<?php

namespace App\Imports;

use App\Models\Panchayat;
use App\Models\Village;
use Maatwebsite\Excel\Concerns\ToModel;

class VillageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = Panchayat::where('panchayat_name', '=', $row['0'])->first();
        if ($checkIfDistrictExists !== null) {
            return new Village([
                'village_name'     => $row['1'],
                'village_id'     => $row['2'],
                'panchayat_id'     => $checkIfDistrictExists->id,
            ]);
        }
        return new Village([

        ]);
    }


}
