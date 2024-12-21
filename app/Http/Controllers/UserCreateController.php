<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use Monolog\Handler\IFTTTHandler;

class UserCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::pluck('title','id');
        return view('users.create',compact('roles'));
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
    public  function  get_myprofile($id)
    {
        $id=\Crypt::decrypt($id);
        $user= User::where('id',$id)->first();
        return view('users.my_profile',compact('user'));
    }
    public function update_myprofile(Request $request ,$id)
    {

        $validatedData = $request->validate([
            'email' =>  'required|string',
            'address' => 'required|string',
            'gst_no' => 'required|string'

        ]);

        User::where('id',$id)->update([
            'email' => $request->email
            ]
        );
        
        Dealer::where('pidms_user_id',$id)->update([
            'address' => $request->address,
            'gst_no'  => $request->gst_no
        ]);  

        return redirect()->back()->with('success', 'Update profile Successfully');
    }


    public  function  change_password($id)
    {
        $id=\Crypt::decrypt($id);
        $user= User::where('id',$id)->first();
        return view('users.change_password',compact('user'));
    }


    public function update_password(Request $request ,$id)
    {

        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',


        ]);

        User::where('id',$id)->update(['password'=> bcrypt($request->password)]);

        return redirect()->back()->with('success', 'Update profile Successfully');
    }

}
