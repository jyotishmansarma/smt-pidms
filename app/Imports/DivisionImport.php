<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DivisionImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $checkIfDistrictExists = District::where('district_name', '=', $row['2'])->first();
            if ($checkIfDistrictExists !== null) {
            $user = User::create([
                'name' => $row[0],
                'username' => $row[0],
                'email' => $row[0].'@jjmassam.in',
                'password' => bcrypt($row[1]),
                'remember_token' => null,

            ]);
            $division = Division::create([
                'division_name' => $row[0],
                'district_id' => $checkIfDistrictExists->id,
            ]);
           DivisionUser::create([
                'division_id' => $division->id,
                'user_id' => $user->id,
            ]);
        }
        }
    }
}
