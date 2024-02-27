<?php

namespace App\Http\Livewire;

use App\Models\AssignHistory;
use App\Models\Circle;
use App\Models\CircleUser;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\IssueTracking;
use App\Models\IssueType;
use App\Models\Status;
use App\Models\SubIssueType;
use App\Models\User;
use App\Models\ZoneMappingWithTO;
use App\Models\ZoneUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IssueStatusUpdate extends Component
{
    public $status;
    public $issueId;
    public $issue_status;
    public $remarks;
    public $description;
    public $issue_id;
    public $forward_to;
    public function submitForm()
    {

        $this->validate([
            'status' => 'required',
            'remarks' => 'required',
        ]);

       if($this->status==3)
       {

          AssignHistory::where('issue_id',$this->issueId)->update(['status'=>$this->status,'remarks'=>$this->remarks]);
          IssueTracking::where('id',$this->issueId)->update(['application_status'=>$this->status]);
       }
        if($this->status==2)
        {

            $assign_history=AssignHistory::where('issue_id',$this->issueId)->where('active',1)->first();

            AssignHistory::where('issue_id',$this->issueId)->update(['active'=>0]);
            $data=[
                'issue_id'=>$this->issueId,
                'from_user_id'=>  Auth::user()->id,
                'to_user_id'=>$this->forward_to,
                'active'=>1,
                'sub_date'=>$assign_history->sub_date,
                'status'=>$this->status,
                'status_updated_at'=>Carbon::now(),
            ];
            AssignHistory::create($data);
            IssueTracking::where('id',$this->issueId)->update(['application_status'=>$this->status]);
        }

        return redirect()->back()->with('success', 'Issue Updated successfully!');

    }
    public function render()
    {


        $issue_types = IssueType::get();
        $sub_issueTypes = SubIssueType::get();
        $status_name=Status::get();
        $role = User::whereHas('roles', function ($query) {
            $query->where('title', 'SPS');
        })->get();
        $issue_tracking=IssueTracking::with('issue_relato_to','user_details','issue_types','assign_histroty.assign_to','assign_histroty.status_name')
            ->where('id',$this->issueId)->first();
        $issue = IssueTracking::findOrFail($this->issueId);
        $documents = $issue->documents;

        return view(
            'livewire.issue-status-update',
            [  'issue_types' => $issue_types,
                'sub_issueTypes'=>$sub_issueTypes,
                'status_name'=>$status_name,
                'role'=>$role,
                'issueId'=>$this->issueId,
                'issue_tracking'=>$issue_tracking,
                'documents'=>$documents

            ]
        );
    }
}
