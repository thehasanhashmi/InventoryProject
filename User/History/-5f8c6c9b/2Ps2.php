<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public $filter = 'all'; // Default filter for 'All' users

    public function filterByRole($role)
    {
        $this->filter = $role; // Set the filter based on the button clicked
    }

    public function render()
    {
        // Query users based on the selected filter
        if ($this->filter == 'Admin') {
            $users = User::where('role', 'Admin')->paginate(10);
        } elseif ($this->filter == 'Inventory Manager') {
            $users = User::where('role', 'Inventory Manager')->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        // Counts for each role
        $allCount = User::count();
        $adminCount = User::where('role', 'Admin')->count();
        $inventoryManagerCount = User::where('role', 'Inventory Manager')->count();

        return view('livewire.user-table', [
            'users' => $users,
            'allCount' => $allCount,
            'adminCount' => $adminCount,
            'inventoryManagerCount' => $inventoryManagerCount,
        ]);
    }
}
