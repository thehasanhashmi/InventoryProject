<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class SupplierTable extends Component
{
    public function render()
    {
        $suppliers=Supplier::all();
        return view('livewire.supplier-table',[
            'suppliers'=>$suppliers
        ]);
    }
}
