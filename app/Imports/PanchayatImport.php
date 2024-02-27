<?php

namespace App\Imports;

use App\Models\Block;
use App\Models\Panchayat;
use Maatwebsite\Excel\Concerns\ToModel;

class PanchayatImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $checkIfDistrictExists = Block::where('block_name', '=', $row['0'])->first();
//       dd($checkIfDistrictExists->id);
        if ($checkIfDistrictExists !== null) {
            return new Panchayat([
                'panchayat_name'     => $row['1'],
                'block_id'     => $checkIfDistrictExists->id,
            ]);
        }
        return new Panchayat([

        ]);
    }


}
