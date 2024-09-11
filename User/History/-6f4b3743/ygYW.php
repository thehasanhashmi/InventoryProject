<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CreateUserForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $role = 'Admin';

    public function submit()
    {
        // Validation and API call logic
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

            dd(config('app.url') . 'api/register');
        $response = Http::post(config('app.url') . '/api/register', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ]);

        if ($response->successful()) {
            return redirect()->to('/listUser');
        } else {
            session()->flash('error', 'Registration failed. Please try again.');
        }
    }

    public function render()
    {
        // Specify the custom path to the view file
        return view('livewire.inventory.user.addUser');
    }
}
