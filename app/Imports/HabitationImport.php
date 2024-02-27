<?php

namespace App\Imports;

use App\Models\Habitation;
use App\Models\Village;
use Maatwebsite\Excel\Concerns\ToModel;

class HabitationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = Village::where('village_id', '=', $row['0'])->first();
//        dd($row['1']);
        if ($checkIfDistrictExists !== null) {
            return new Habitation([
                'habitation_name'     => $row['1'],
                'habitation_id'     => $row['2'],
                'village_id'     => $checkIfDistrictExists->id,
            ]);
        }


    }
}
