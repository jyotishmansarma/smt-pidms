<?php

namespace App\Http\Livewire;

use App\Models\SchemeCompletion;
use App\Models\Schemes;
use App\Models\SlsscSchemes;
use App\Models\SmtSlsscMapping;
use App\Models\UpdatedSMTdata;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SchemeReport extends Component
{
    use WithPagination;
    public $orderColumn = "scheme";
    public $sortOrder = "asc";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    public $searchTerm = [];
    public $schemeStatusFilter = 2;

    public $showModal = false;
    public $showUpdateModal = false;
    public $search = [];

    public $searches ;
    public $results = [];
    public $result_add = [];
    public $selectedItem = '';
    public $selectedName = null;
    public $selectedSMTScheme = null;
    public $successMessage = '';

    public $data = [];
    public $currentData = '';
    public $showDiv = false;

    public $isChecked = false;
    public $timesChecked = 0;
    public $divs = [];

    public $searchTerms;

    public $sslc_id ;

    public $scheme_data;

    public $est_cost;
    public $fhtc_number;
    public $update_smt_id;
  

    public function updatesmtdate($smt_id)
    {
        // dd($this->selectedSMTScheme);
        $data=
        [
            'smt_id'=>$smt_id,
            'update_est_cost'=>$this->est_cost,
            'update_no_fhtc'=>$this->fhtc_number,
            'is_matching'=>0,
            'status'=>0
        ];
        UpdatedSMTdata::create($data);
        $this->successMessage = ' updated successfully!';
        $this->closeupdateModal();
        $this->dispatchBrowserEvent('dismiss-success-message');
        
    }

    public function approvedModel()
    {
        

    }
    public function submitForm()
    {
        // dd($this->sslc_id);
       $smt_id= $this->selectedSMTScheme;
       for($i=0;$i<count($this->sslc_id);++$i)
       {
           $data=[
            'smt_id'=>$smt_id,
            'slssc_id'=>$this->sslc_id[$i],
            'slssc_scheme_id'=>$this->searches[$i],
           ];

          $id= SmtSlsscMapping::create( $data);
       }

   
    
       $slssc_scheme_id=SmtSlsscMapping::where('smt_id',$id->smt_id)->max('slssc_scheme_id');
   
       
       $employee = Schemes::findOrFail($this->selectedSMTScheme);
       $employee->slssc_id =$slssc_scheme_id;
        $employee->save();
       $this->successMessage = 'SLSSC Scheme id updated successfully!';
       $this->closeModal();
       $this->dispatchBrowserEvent('dismiss-success-message');


    }

    public function updatedSearchTerm($value)
    {
        $this->searches = null; // Reset the selected user when the search term changes
    }
    public function addDiv()
    {
        $this->divs[] = count($this->divs) + 1;
    }

    public function removeDiv($index)
    {
        unset($this->divs[$index]);
        $this->divs = array_values($this->divs); // Re-index the array after removing an element
    }


    public function toggleDiv()
    {
        $this->showDiv = !$this->showDiv;
        if (!$this->showDiv) {
            $this->currentData = '';
        }
    }

    

    public function addData()
    {
        if ($this->currentData !== '') {
            $this->data[] = $this->currentData;
            $this->currentData = '';
        }
    }

    public function openModal($schemeId)
    {
        $this->showModal = true;
        $this->selectedSMTScheme = $schemeId;
    }

    public function updateModel($schemeId)
    {
        $this->showUpdateModal = true;
        $scheme_datas= Schemes::where('id',$schemeId)->first();
        
        $this->scheme_data=$scheme_datas;

    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function closeupdateModal()
    {
        $this->showUpdateModal = false;
    }
    public function selectItem($item)
    {
        $item = json_decode($item);
        $this->selectedItem = $item->id;
        $this->selectedName = $item->scheme_name;
        $employee = Schemes::findOrFail($this->selectedSMTScheme);
        $employee->slssc_id = $item->id;
         $employee->save();
         $this->successMessage = 'SLSSC Scheme id updated successfully!';
         $this->closeModal();
         $this->dispatchBrowserEvent('dismiss-success-message');
    }

    public function searchItems()
    {
        // Perform your search logic based on the entered text in $search
        // Update $searchResults with the matching results
        // For example:
//       dd("");
        $this->results = SlsscSchemes::where('scheme_name', 'like', '%' . $this->search . '%')
        ->limit(10)->get();
//        dd($this->results);
        //  $this->results = DB::table('slssc')->where('slssc_name', 'like', '%' . $this->search . '%')->limit(10)->get();
        //  dd($this->results);
    }

    // public function searchItem()
    // {
        // Perform your search logic based on the entered text in $search
        // Update $searchResults with the matching results
        // For example:
   
        // $this->result_add = SlsscSchemes::where('scheme_name', 'like', '%' . $this->searches . '%')
        // ->limit(10)->get();
  
//        dd($this->results);
        //  $this->results = DB::table('slssc')->where('slssc_name', 'like', '%' . $this->search . '%')->limit(10)->get();
        //  dd($this->results);
    // }


    public function updated(){
        $this->resetPage();
    }
    public function sortOrder($columnName=""){
        $caretOrder = "up";
        if($this->sortOrder == 'asc'){
            $this->sortOrder = 'desc';
            $caretOrder = "down";
        }else{
            $this->sortOrder = 'asc';
            $caretOrder = "up";
        }
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';

        $this->orderColumn = $columnName;

    }
    public function render()
    {

        // $division = auth()->user()->division_users->division;
        // $divisionId = $division->id;
        // $sanctioned = $division->sanctioned;

        // $scheme=Schemes::where('division_id',$divisionId );
//        $slsscscheme=SlsscSchemes::where('division_id',$divisionId );
//
//        if($this->schemeStatusFilter == 1) {
//            $schemesCompleted = SchemeCompletion::where('completed_schemes', '=', 1)->pluck('scheme_id');
//            $scheme->whereIn('id', $schemesCompleted);
//        }else
//        if($this->schemeStatusFilter == 0) {
//            $schemesCompleted = SchemeCompletion::where('completed_schemes', '=', 1)->pluck('scheme_id');
//            $scheme->whereNotIn('id', $schemesCompleted);
//        }
//        if(!empty($this->searchTerm)){
//            $scheme->where('scheme_name','like',"%".$this->searchTerm."%");
//
//        }

        $scheme= Schemes::get();
        $scheme = $scheme->paginate(60);
        $sslc=DB::table('slssc')->get();
        $slected_scheme=  $this->scheme_data;
         $sslc_scheme = SlsscSchemes::where('scheme_name', 'like', '%' . $this->searchTerms . '%')->get();


        return view('livewire.scheme-report', [
            'scheme' => $scheme,
            'sslc'=>$sslc,
            'sslc_schemes'=>$sslc_scheme,
            'slected_schemes'=>$slected_scheme
        ]);
    }
    public  function  filterScheme($type){
        $this->schemeStatusFilter = $type;
    }


    public function toggleCheckbox()
    {
        $this->isChecked = !$this->isChecked;

        if ($this->isChecked) {
            $this->timesChecked++;
        }
    }
}
