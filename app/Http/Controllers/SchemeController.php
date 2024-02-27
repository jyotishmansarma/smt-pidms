<?php

namespace App\Http\Controllers;

use App\Models\SchemeCompletion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        abort_if(Gate::denies('scheme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sslc=DB::table('slssc')->get();
        return view('scheme.index',compact('sslc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort_if(Gate::denies('scheme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        $districtId =  todo
        $data=[
            'scheme_id'=> $request->id,
            'district_id'=>65,
            'division_id'=>$request->division_id,
            'completed_schemes'=>$request->completed_schemes,
            'fhtc_in_completed_schemes'=> $request->fhtc_in_completed_schemes,
            'completed_schemes_handed_pri'=>$request->completed_schemes_handed_pri,
            'balance_schemes_handed_pri'=>$request->balance_schemes_handed_pri,
            'wuc_formed_againts_completed_schemes'=>$request->wuc_formed_againts_completed_schemes,
            'wuc_not_formed_againts_completed_schemes'=>$request->wuc_not_formed_againts_completed_schemes,
            'no_of_jal_mitra_trained'=>$request->no_of_jal_mitra_trained,
           'no_of_jal_mitra_eng_letter'=>$request->no_of_jal_mitra_eng_letter
        ];
       $scheme= SchemeCompletion::where(['division_id'=>$request->division_id,'scheme_id'=>$request->id])->first();

       if($scheme)
       {
        $data= SchemeCompletion::where(['division_id'=>$request->division_id,'scheme_id'=>$request->id])->update($data);
                if($data)
            {
                    $data=[
                        'status'=>'success'
                    ];
            }
            return $data;
       }
       else
       {
            $data= SchemeCompletion::create( $data);
            if($data)
            {
                    $data=[
                        'status'=>'success'
                    ];
            }
            return $data;
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
