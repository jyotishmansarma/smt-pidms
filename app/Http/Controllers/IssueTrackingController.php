<?php

namespace App\Http\Controllers;

use App\Models\AssignHistory;
use App\Models\Circle;
use App\Models\CircleUser;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\IssueDocument;
use App\Models\IssueTracking;
use App\Models\IssueType;
use App\Models\Status;
use App\Models\SubIssueType;
use App\Models\User;
use App\Models\userType;
use App\Models\ZoneMappingWithTO;
use App\Models\ZoneUser;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class IssueTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();
//        if($request->description )
//        {
        $issue_type = IssueType::select('id', 'name')->get();
        $status = Status::select('id', 'name')->get();
        if ($user->hasAnyRole(['TO-IT']) || $user->hasAnyRole(['SPS']) ) {
            $issue_tracking = IssueTracking::with('issue_relato_to', 'issue_types', 'assign_histroty.assign_to', 'assign_histroty.status_name')
                ->whereHas('assign_histroty', function ($query) {
                    $query->where('to_user_id', Auth::user()->id);
                });
        } else {
            $issue_tracking = IssueTracking::with('issue_relato_to', 'issue_types', 'assign_histroty.assign_to', 'assign_histroty.status_name')
                ->whereHas('assign_histroty', function ($query) {
                    $query->where('from_user_id', Auth::user()->id);
                });

        }

        $issue_tracking = $issue_tracking->when(request("issue_type"), function ($query) {
            $query->where('issue_type', request("issue_type"));

        })->when(request("status"), function ($query) {
            $query->where('application_status', request("status"));

        })->orderBy('id','desc')->paginate(10);

        return view('issue.index', compact('issue_tracking', 'issue_type', 'status'));

//        }
//        if ($user->hasAnyRole(['TO-IT']))
//        {
//            $issue_tracking=IssueTracking::with('issue_relato_to','issue_types','assign_histroty.assign_to','assign_histroty.status_name')
//                ->whereHas('assign_histroty', function ($query) {
//                    $query->where('to_user_id', Auth::user()->id);
//                })->paginate(10);
//        }
//        else
//        {
//            $issue_tracking=IssueTracking::with('issue_relato_to','issue_types','assign_histroty.assign_to','assign_histroty.status_name')
//                ->whereHas('assign_histroty', function ($query) {
//                    $query->where('from_user_id', Auth::user()->id);
//                })->paginate(10);
//
//        }
//        return view('issue.index',compact('issue_tracking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $issue_type = IssueType::get();
        return view('issue.create', compact('issue_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([

            'issue_related_to' => 'required',
            'sub_issue_type' => 'required',
            'description' => 'required',
            'video'  => 'mimes:mp4,mov,ogg,qt | max:20000',
            'audio' => 'mimes:mp3,wav|max:2048',
            'document' => 'mimes:pdf,doc,docx',

        ]);

        $issue_type = IssueType::select('short_name')->where('id', $request->issue_related_to)->first();
        $user_type = userType::select('name')->where('id', Auth::user()->user_type)->first();

        $timestamp = time();
        $currentDate = date('Y-m-d ', $timestamp);
        $lastRecord = IssueTracking::latest()->first();
        if(    $lastRecord)
        {
            $lastRecord=    $lastRecord->id+1;
        }
        else
        {
            $lastRecord= 1;
        }
        $serial_no = $issue_type->short_name . '-' . ucfirst(substr($user_type->name, 0, 1)) . '-' . $currentDate . '-' .$lastRecord;
        $data =
            [
                'users_id' => \Illuminate\Support\Facades\Auth::user()->id,
                'serial_no' => $serial_no,
                'issue_type' => $request->issue_related_to,
                'sub_issue_type' => $request->sub_issue_type,
                'description' => $request->description,
                'application_status' => 1,

            ];


        $model = IssueTracking::create($data);

        if ($request->file('path_name'))
        {
          $path_name=  $request->file('path_name');
            foreach ($path_name as $key => $file) {

                $filePath = $file->store('uploads/'.$request->documents_type[$key], 'public'); // Store in 'storage/app/documents'
                IssueDocument::create([
                    'issue_id' => $model->id,
                    'document_type' => $request->documents_type[$key],
                    'image_path' => $filePath,
                ]);
            }
        }
//        foreach($request->documents_type as $key => $doc_type)
//        {
//            $filePath='';
//             if( $doc_type==1 && $request->file('video') )
//             {
//                 $file = $request->file('video');
//                 $fileName = time() . '_' . $file->getClientOriginalName();
//                 $filePath = $file->storeAs('video', $fileName, 'public');
//
//             }
//            if( $doc_type==2 && $request->file('audio') )
//            {
//                $file = $request->file('audio');
//                $fileName = time() . '_' . $file->getClientOriginalName();
//                $filePath = $file->storeAs('audio', $fileName, 'public');
//
//            }
//            if( $doc_type==3 && $request->file('image') )
//            {
//                $file = $request->file('image');
//                $fileName = time() . '_' . $file->getClientOriginalName();
//                $filePath = $file->storeAs('image', $fileName, 'public');
//
//            }
//            if( $doc_type==4 && $request->file('document') )
//            {
//                $file = $request->file('document');
//                $fileName = time() . '_' . $file->getClientOriginalName();
//                $filePath = $file->storeAs('document', $fileName, 'public');
//
//            }
//
//            if( $filePath) {
//                IssueDocument::create([
//                    'issue_id' => $model->id,
//                    'document_type' => $request->documents_type[$key],
//                    'image_path' => $filePath,
//                ]);
//            }
//        }

        $user_type = Auth::user()->user_type;


        if ($user_type == 1) {
            $zone = ZoneUser::where('user_id', Auth::user()->id)->first();
            $zone = $zone->zone_id;

        }
        if ($user_type == 2) {
            $zone = CircleUser::where('user_id', Auth::user()->id)->first();
            $zone = Circle::where('id', $zone->circle_id)->first();

            $zone = $zone->zone_id;

        }
        if ($user_type == 3) {
            $zone = DivisionUser::where('user_id', Auth::user()->id)->first();
            $zone = Division::where('id', $zone->division_id)->first();
            $zone = $zone->zone_id;
        }

        if ($zone) {
            $zone_mapping = ZoneMappingWithTO::where('zone_id', $zone)->first();

        }
        if ($zone_mapping) {
            $zone_mapping = $zone_mapping->user_id;
        } else {
            $zone_mapping = 1;
        }
        if ($model) {
            $data =
                [
                    'issue_id' => $model->id,
                    'from_user_id' => Auth::user()->id,
                    'to_user_id' => $zone_mapping,
                    'active' => 1,
                    'sub_date' => Carbon::now(),
                    'status' => 1,
                    'status_updated_at' => Carbon::now(),
                ];
            AssignHistory::create($data);
        }

        return redirect()->back()->with('success', 'Issue submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('issue.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getIssueTypes(Request $request)
    {
        $issueTypeId = $request->issue_related_to;
        $issueTypes = SubIssueType::where('issue_type_id', $issueTypeId)->get();

        return response()->json($issueTypes);
    }

    public function getIssueData($id)
    {
        $issue_tracking = IssueTracking::with('issue_relato_to', 'issue_types', 'assign_histroty.assign_to', 'assign_histroty.status_name')
            ->where('id', $id)->first();

        return view('issue.show', compact('issue_tracking'));
    }

    public function delete($id)
    {
        $id=\Crypt::decrypt($id);
        $issue=IssueTracking::find($id);
        if( $issue)
        {
            $issue->assign_histroty()->delete();
            $issue->delete();
            return redirect()->back()->with('success', 'Issue deleted');
        }

    }
    public function approvedIssue($id)
    {
        if( IssueTracking::where(['id'=>$id,'accept'=>1,'application_status'=>4])->first())
        {
            return redirect()->back()->with('success', 'Issue already Accepted!');
        }
        else
        {
            IssueTracking::where('id',$id)->update(['accept'=>1,'application_status'=>4]);
            return redirect()->back()->with('success', 'Issue  Accepted!');
        }

    }

    public function track_application($id)
    {
        return view('issue.track_application');
    }
    public function search_issue_details($id)
    {
        $issue_tracking = IssueTracking::with('issue_relato_to', 'issue_types', 'assign_histroty.assign_to', 'assign_histroty.status_name')
            ->where('id', $id)->first();
        return view('issue.serach_issue_details',compact('issue_tracking'));
    }
}
