<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class SupplierTable extends Component
{
    public function render()
    {
        $suppliers=Supplier::paginate(20);
        $suppliers_count=Supplier::all()->count();
        return view('livewire.supplier-table',[
            'suppliers'=>$suppliers,
            'suppliers_count' => $suppliers_count
        ]);
    }
}
