<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\SlsscSchemes;
use App\Models\SlsscApproval;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SlsscImport implements ToCollection,WithStartRow
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

//            dd($row);

//            $checkSchemeNameExist = Slssc::where('scheme_name', '=', $row[4])->first();
//            if ($checkSchemeNameExist == null) {
            $estmdCost = max([$row[6],$row[8],$row[10],$row[12], $row[14]]);
            $maxfhtc = max([$row[7],$row[9],$row[11],$row[13], $row[15]]);
//            dd(($maxfhtc));
//            print_r($row[2]);
//            $divisionId = Division::whereRaw( 'division_name = "'.strtolower(trim($row[2].'"')))->pluck("id")
//                ->first();
//            $division = Division::where('division_name', '=', $row[2])->first();
//            $division = Division::whereRaw("UPPER('division_name') = ". strtoupper($row[2]))->pluck('id')->first();
//            dd($division);
                $slssc = SlsscSchemes::create([
                    'district_id' => $row[1],
                    'division_id' => $row[2],
                    'scheme_name' => $row[3],
                    'sanctioned_type' => $row[4],
                    'scheme_type' => $row[5],
                    'final_estmd_cost' => $estmdCost,
                    'final_fhtcs_approved' => $maxfhtc,
                ]);

                SlsscApproval::create([
                    'slssc_id' => 1,
                    'slssc_scheme_id' => $slssc->id,
                    'estimated_cost' =>  $row[6],
                    'fhtc_planned' =>  $row[7],
                ]);
                SlsscApproval::create([
                    'slssc_id' => 2,
                    'slssc_scheme_id' => $slssc->id,
                    'estimated_cost' =>  $row[8],
                    'fhtc_planned' =>  $row[9],
                ]);
                SlsscApproval::create([
                    'slssc_id' => 3,
                    'slssc_scheme_id' => $slssc->id,
                    'estimated_cost' =>  $row[10],
                    'fhtc_planned' =>  $row[11],
                ]);
                SlsscApproval::create([
                    'slssc_id' => 4,
                    'slssc_scheme_id' => $slssc->id,
                    'estimated_cost' =>  $row[12],
                    'fhtc_planned' =>  $row[13],
                ]);
                SlsscApproval::create([
                    'slssc_id' => 5,
                    'slssc_scheme_id' => $slssc->id,
                    'estimated_cost' =>  $row[14],
                    'fhtc_planned' =>  $row[15],
                ]);

            }

//        }
    }

    public function startRow(): int
    {
        return 4;
    }
}
