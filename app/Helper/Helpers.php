<?php


namespace App\Helper;

use App\Models\SchemeCompletion;
use App\Models\SlsscDropedMapping;
use App\Models\UpdatedSMTdata;

class Helpers
{
    public static function scheme_report($divisionId,$schemeId)
    {
        $data=SchemeCompletion::where(['division_id'=>$divisionId,'scheme_id'=>$schemeId])->first();

        return $data;
    }

    public static function scheme_update_status($smt_id)
    {
        // $status='';
        $data=UpdatedSMTdata::where(['smt_id'=>$smt_id,'status'=>0])->first();
 
        return $data;

     
    }
    public static function scheme_update_data($smt_id)
    {
        $data=UpdatedSMTdata::where(['smt_id'=>$smt_id,'status'=>0])->first(); 
        return  $data;
    }

    public static function mapping_dropped_status($smt_id)
    {
       $dropped_mapping_status= SlsscDropedMapping::where('slssc_scheme_id',$smt_id)->first();
       return $dropped_mapping_status;
    }


    public static function  niceDate($date)
        {
            if ($date) {
                return date('d-m-Y', strtotime($date));
            }
        }
    public static function  niceTime($date)
        {
            if ($date) {
                return date('h:i A', strtotime($date));
            }
        }

    public static function orderStatus(): array
        {
            return [
                "delivered",
                "cancelled",
                "refunded",
            ];
        }

    public static function convertToDecimal($number, $place = 2) 
        {
            return number_format($number, $place, ".", "");
        }
}
