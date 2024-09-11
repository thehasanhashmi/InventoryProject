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

        return view('livewire.user-table',[
            $invoices,
            $invoices_count,
            $count =>$invoices_count
        ]);
    }
}
