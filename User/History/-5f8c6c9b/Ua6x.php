<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public $filter = 'all'; // Set default filter to 'all'

    public function filterByRole($role)
    {
        $this->filter = $role; // Update the filter when a button is clicked
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
            'filter' => $this->filter, // Pass the filter state to the view
        ]);
    }
}
