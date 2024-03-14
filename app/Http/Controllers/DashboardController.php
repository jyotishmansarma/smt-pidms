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
//        dd(isset(auth()->user()->division_users->division_id));
//        if(auth()->user()->roles()->get()->contains(2)){
//            $divisionId = auth()->user()->division_users->division_id;
//
//            $schemeCompletion = SchemeCompletion::where("created_at", '>', $sessionStart)->where("created_at", '<', $sessionEnd)->where("division_id", '=', $divisionId)->get();
//
//        }else {
//            $schemeCompletion = SchemeCompletion::where("created_at", '>', $sessionStart)->where("created_at", '<', $sessionEnd)->get();
//        }
        
        $user = Auth::user();
       
        //$user_type=userType::select('name')->where('id',$user->user_type)->first();

        if ($user->hasAnyRole(['TO-IT']) || $user->hasAnyRole(['SPS'])){

            $my_issues = \App\Models\AssignHistory::where('to_user_id',auth()->user()->id)->where('active',1)->get();
            $pending_issue = $my_issues->where('status',1)-> count();
            $resolved_issue = $my_issues->where('status',3)-> count();
            $accept_issue = $my_issues->where('status',4)-> count();

        }  else {
            $my_issues = \App\Models\IssueTracking::where('users_id',auth()->user()->id)->get();
            $pending_issue = $my_issues->where('application_status',1)->where('users_id',auth()->user()->id)-> count();
            $resolved_issue = $my_issues->where('application_status',3)->where('users_id',auth()->user()->id)-> count();
            $accept_issue = $my_issues->where('application_status',4)->where('users_id',auth()->user()->id)-> count();

        }
        $total_issue = $my_issues->count();

        return view('dashboard',compact('total_issue','pending_issue','resolved_issue','accept_issue') );
    }
}
