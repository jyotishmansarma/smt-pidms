<?php

namespace App\Http\Livewire;

use App\Models\AssignHistory;
use App\Models\Circle;
use App\Models\CircleUser;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\Document;
use App\Models\IssueDocument;
use App\Models\IssueTracking;
use App\Models\IssueType;
use App\Models\SubIssueType;
use App\Models\ZoneMappingWithTO;
use App\Models\ZoneUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class IssueTrackingFrom extends Component
{
    use WithFileUploads;
    public $message;
    public $issue_related_to;
    public $sub_issue_type;
    public $description;
    public $document;
    public $image;
    public $audio;
    public $video;
    public $divs = [];
    public $documents;
    public $documents_type;
    public $files ;
    public $descrption;
    public $maxOptions = 7;
    public $results=[];

    public function addDiv()
    {
        if(count($this->divs)< $this->maxOptions)
        {
            $this->divs[] = count($this->divs);
        }

    }

    public function removeDiv($index)
    {
        unset($this->divs[$index]);
        $this->divs = array_values($this->divs); // Re-index the array after removing an element
    }
    public function render()
    {
        $issue_types = IssueType::get();
        $sub_issueTypes = SubIssueType::where('issue_type_id', $this->issue_related_to)->get();
        $document = Document::get();
        $results = [];
        if($this->description) {
            $this->results = IssueTracking::search($this->description)->get();
        }


        return view(
            'livewire.issue-tracking-from',
            [  'issue_types' => $issue_types,
            'sub_issueTypes'=>$sub_issueTypes,
                'document_type'=>$document,
                'results'=>$results,
            ]
        );
    }

    public function clearSearch()
    {
        $this->description = '';
        $this->results = [];
    }

    public function assign_sale()
    {


        $this->emit('showModalAssignSale');
    }



}
