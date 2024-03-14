<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Panchayat;
use App\Models\PurchaseOrder;
use App\Models\Schemes;
use Livewire\Component;
use Livewire\WithPagination;

class ManufacturePoEntryList extends Component
{
   

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = "";
    public $tableStatus = "";
    // public $order_status = "";
    // public $status = [
    //     "confirmed" => "confirmed",
    //     "cancelled" => "cancelled",
    //     "delivered" => "delivered",

    // ];
    // public $sortField = "created_at";
    // public $sortAsc = false;

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
        $purchaseorders = PurchaseOrder::query()
        // ->where('status','==','1')
        // ->when($this->search, function($query){
        //     $query->where("order_number", "LIKE", "%{$this->search}%")
        //     ->orWhere("recipient_no", "LIKE", "%{$this->search}%")
        //     ->where('status','==','1');
        // })
        // ->when($this->tableStatus !== "", function($query){
        //     $query->where("status", $this->tableStatus)
        //     ->where('status','==','1');
        // })
        //->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return view('livewire.manufacture-po-entry-list',compact('purchaseorders'));

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
