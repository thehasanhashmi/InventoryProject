<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $filter = 'all'; // Default filter for 'all'
    public $search = ''; // New property to store search input

    public function filterByRole($role)
    {
        $this->filter = $role; // Update the filter when a button is clicked
        $this->resetPage(); // Reset to page 1 when filter changes
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to page 1 when search changes
    }

    public function render()
    {
        // Build the query based on filter and search
        $query = User::query();

        // Apply the role filter
        if ($this->filter == 'Admin') {
            $query->where('role', 'Admin');
        } elseif ($this->filter == 'Inventory Manager') {
            $query->where('role', 'Inventory Manager');
        }

        // Apply the search filter
        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        }

        // Get the users with pagination
        $users = $query->paginate(10);

        // Counts for each role
        $allCount = User::count();
        $adminCount = User::where('role', 'Admin')->count();
        $inventoryManagerCount = User::where('role', 'Inventory Manager')->count();

        return view('livewire.user-table', [
            'users' => $users,
            'allCount' => $allCount,
            'adminCount' => $adminCount,
            'inventoryManagerCount' => $inventoryManagerCount,
            'filter' => $this->filter,
            'search' => $this->search,
        ]);
    }
}
