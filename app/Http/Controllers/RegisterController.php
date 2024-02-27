<?php

namespace App\Http\Controllers;

use App\Models\CircleUser;
use App\Models\DivisionUser;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\ZoneUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function create()
    {

        return view('users.register');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'contact_number' => [
                'required',
                'regex:/^\d{10}$/',
                'unique:users,contact_number',
            ],
            'email'=>'required|email|unique:users,email',
            'user_type'=>'required',
            'sub_type'=>'required',

        ]);

       try {
            $data =
                [
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                    'contact_number' => $request->contact_number,
                    'username' => $request->contact_number,
                    'email' => $request->email,
                    'user_type' => $request->user_type,
                ];


            $user = User::create($data);


            if(!empty($user))
            {


                if($request->user_type==3)
                {
                    $data=
                        [
                            'user_id'=>$user->id,
                            'division_id'=>$request->sub_type
                        ];
                    DivisionUser::create($data);

                }
                if($request->user_type==2)
                {

                    $data=
                        [
                            'user_id'=>$user->id,
                            'circle_id'=>$request->sub_type
                        ];
                    CircleUser::create($data);

                }
                if($request->user_type==1)
                {
                    $data=
                        [
                            'user_id'=>$user->id,
                            'zone_id'=>$request->sub_type
                        ];

                    ZoneUser::create($data);

                }
                $role=
                    [
                        'role_id'=>2,
                        'user_id'=>$user->id
                    ];
                RoleUser::create($role);
            }
           $credentials = $request->only('username', 'password');


           return redirect('/login')->with('success', 'Register Successfully');
         //  return redirect()->back()->with('success', 'Register Successfully');
        }
        catch (\Exception $e) {

            DB::rollback();
           return redirect()->back()->with('msgerror', 'something wrong');
       }
    }
}
