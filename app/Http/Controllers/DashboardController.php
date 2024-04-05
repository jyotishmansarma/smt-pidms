<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\PhysicalProgress;
use App\Models\PurchaseOrder;
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



        $total_order_count = PurchaseOrder::count();
        $pending_order_count = PurchaseOrder::where('status', 2)->count();
        $rejected_order_count = PurchaseOrder::where('status', 4)->count();
        $accepted_order_count = PurchaseOrder::where('status', 8)->count();
        $resubmitted_order_count = PurchaseOrder::where('status', 9)->count();
        return view('dashboard',compact('total_order_count','pending_order_count','rejected_order_count',
            'accepted_order_count','resubmitted_order_count') );
    }
}
