<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function addUser()
    {
        return view('inventory.user.addUser');
    }

    public function editUser($id)
    {
        $user=User::findOrFail($id);
        return view('inventory.user.addUser');
    }

    public function listUser()
    {
        return view('inventory.user.listUser');
    }
}
