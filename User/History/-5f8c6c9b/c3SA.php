<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Invoice;
class UserTable extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        $users_count = User::all()->count();
     


        return view('livewire.user-table',[
            "users"=>$users,
            "users_count"=>$users_count,
        ]);
    }
}
