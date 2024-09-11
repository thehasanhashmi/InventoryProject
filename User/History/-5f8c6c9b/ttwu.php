<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Invoice;
class UserTable extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(10);
        $invoices_count = Invoice::all()->count();
        $count=$invoices_count;

        return view('livewire.user-table',[
            "invoices"=>$invoices,
            "invoices_count"=>$invoices_count,
        ]);
    }
}
