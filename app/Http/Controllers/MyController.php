<?php
namespace App\Http\Controllers;

use App\Imports\BlockImport;
use App\Imports\DivisionImport;
use App\Imports\HabitationImport;
use App\Imports\PanchayatImport;
use App\Imports\SlsscImport;
use App\Imports\VillageImport;
use Illuminate\Http\Request;
use App\Imports\DistrictImport;
use Maatwebsite\Excel\Facades\Excel;
class MyController
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

//    /**
//     * @return \Illuminate\Support\Collection
//     */
//    public function export()
//    {
//        return Excel::download(new UsersExport, 'users.xlsx');
//    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new DistrictImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importblock()
    {
        Excel::import(new BlockImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importpanchayat()
    {
        Excel::import(new PanchayatImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importvillage()
    {
        Excel::import(new VillageImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importhabitation()
    {
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 300);
        Excel::import(new HabitationImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importdivision()
    {
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 300);
        Excel::import(new DivisionImport(),request()->file('file'));

        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importslssc()
    {
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 300);
        ini_set('upload_max_filesize', '32M');
        Excel::import(new SlsscImport(),request()->file('file'));

        return back();
    }
}
