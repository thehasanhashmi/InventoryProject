<?php

namespace App\Livewire;

use App\Models\Warehouse;
use Livewire\Component;

class WarehouseTable extends Component
{
    public function render()
    {
        // Fetch warehouses and count
        $warehouses = Warehouse::paginate(20);
        $warehouses_count = Warehouse::count();

        return view('livewire.warehouse-table', [
            'warehouses' => $warehouses,
            'warehouses_count' => $warehouses_count,
        ]);
    }
}
