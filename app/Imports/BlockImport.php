<?php

namespace App\Imports;

use App\Models\Block;
use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;

class BlockImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = District::where('district_name', '=', $row['0'])->first();
//       dd($checkIfDistrictExists->id);
        if ($checkIfDistrictExists !== null) {
        return new Block([
            'block_name'     => $row['1'],
            'district_id'     => $checkIfDistrictExists->id,
        ]);
    }
        return new Block([

        ]);
    }

}
