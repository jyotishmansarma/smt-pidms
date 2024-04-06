<?php

namespace App\Http\Livewire;

use App\Models\PurchaseOrder;
use App\Models\Status;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManufacturePoRejectedList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $searchTerm = "";
    public $tableStatus = "";
    public $sortField = "created_at";
    public $sortAsc = false;
    public $statuses;
    public $filterStatus;

    // public $status = [
    //     "confirmed" => "confirmed",
    //     "cancelled" => "cancelled",
    //     "delivered" => "delivered",

    // ];


    // public function sortBy($field)
    // {
    //     if ($this->sortField === $field) {
    //         $this->sortAsc = ! $this->sortAsc;
    //     } else {
    //         $this->sortAsc = true;
    //     }

    //     $this->sortField = $field;
    // }

    public function render()
    {
        $user = Auth::user();
        $this->statuses = Status::all();

        if ($user->hasAnyRole(['Manufacture'])) {

        $purchaseorders = PurchaseOrder::query()
            ->where('status',4)
            ->when($this->searchTerm, function ($query) {
                $query->where('status', "%{$this->searchTerm}%");
                // ->orWhere("contractor_id", "LIKE", "%{$this->search}%")
                // ->where('status','==','1');
            })
            ->when($this->filterStatus, function ($query) {
                $query->where('status',$this->filterStatus);
            })
            // ->when($this->tableStatus !== "", function($query){
            //     $query->where("status", $this->tableStatus)
            //     ->where('status','==','1');
            // })
            
            ->where('pidms_user_id', $user->id)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.manufacture-po-rejected-list', compact('purchaseorders'));

    }else  if ($user->hasAnyRole(['Admin'])){

            $purchaseorders = PurchaseOrder::query()
                ->where('status',4)
                ->when($this->searchTerm, function ($query) {
                    $query->where('order_id', "LIKE", "%{$this->searchTerm}%");
                    // ->orWhere("contractor_id", "LIKE", "%{$this->search}%")
                    // ->where('status','==','1');
                })
                ->when($this->filterStatus, function ($query) {
                    $query->where('status',$this->filterStatus);
                })
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
            return view('livewire.manufacture-po-rejected-list', compact('purchaseorders'));
        }

    }


    public function updatedTableStatus($value)
    {
        $this->resetPage();
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }

    public function updatedperPage($value)
    {
        $this->resetPage();
    }
   
}
