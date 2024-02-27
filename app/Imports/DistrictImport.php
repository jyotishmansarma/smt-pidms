<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DistrictImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = District::where('district_name', '=', $row['district_name'])->first();
//       dd($checkIfDistrictExists->id);
        if ($checkIfDistrictExists == null) {
            return new District([
                'district_name' => $row['district_name'],
            ]);
        }


    }
}
