<?php

namespace App\Imports;

use App\Models\Division;
use App\Models\Schemes;
use Maatwebsite\Excel\Concerns\ToModel;

class SchemeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = Division::where('division_name', '=', $row['0'])->first();

//        dd($row['1']);
        if ($checkIfDistrictExists !== null) {
            return new Schemes([
                'scheme_name'     => $row['1'],
                'division_id'     => $checkIfDistrictExists->id,
            ]);
        }


    }

}
