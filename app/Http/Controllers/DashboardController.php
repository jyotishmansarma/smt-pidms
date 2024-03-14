<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\PhysicalProgress;
use App\Models\SchemeCompletion;
use App\Models\userType;
use App\Models\VillagePhysicalProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

        
        $user = Auth::user();
       
        //$user_type=userType::select('name')->where('id',$user->user_type)->first();

        return view('dashboard' );
    }
}
