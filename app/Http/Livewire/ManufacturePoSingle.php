<?php

namespace App\Http\Livewire;

use App\Models\PurchaseOrder;
use Livewire\Component;

class ManufacturePoSingle extends Component

{
    public string $purchaseorder_id;

    public function render()
    {
        $purchaseorder =  PurchaseOrder::find($this->purchaseorder_id);
        return view('livewire.manufacture-po-single', compact('purchaseorder'));
    }
}
