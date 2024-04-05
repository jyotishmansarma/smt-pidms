<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Panchayat;
use App\Models\PurchaseOrder;
use App\Models\Schemes;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManufacturePoEntryList extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $searchTerm = "";
    public $tableStatus = "";
    public $sortField = "created_at";
    public $sortAsc = false;
    // public $order_status = "";
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
        if ($user->hasAnyRole(['Manufacture'])) {

        $purchaseorders = PurchaseOrder::query()
            ->when($this->searchTerm, function ($query) {
                $query->where('order_id', "LIKE", "%{$this->searchTerm}%");
                // ->orWhere("contractor_id", "LIKE", "%{$this->search}%")
                // ->where('status','==','1');
            })

        // ->when($this->tableStatus !== "", function($query){
        //     $query->where("status", $this->tableStatus)
        //     ->where('status','==','1');
        // })
       ->where('pidms_user_id', $user->id)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.manufacture-po-entry-list', compact('purchaseorders'));

    }else  if ($user->hasAnyRole(['Admin'])){

            $purchaseorders = PurchaseOrder::query()
                ->when($this->searchTerm, function ($query) {
                    $query->where('order_id', "LIKE", "%{$this->searchTerm}%");
                    // ->orWhere("contractor_id", "LIKE", "%{$this->search}%")
                    // ->where('status','==','1');
                })
               ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
            return view('livewire.manufacture-po-entry-list', compact('purchaseorders'));
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
