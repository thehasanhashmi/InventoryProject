<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // User registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 201,
            'msg' => "Account Created Successfully",
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function updateUser(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'role' => 'required|string',
            'password' => 'nullable|string|min:6', // Password is optional (nullable)
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Only update the password if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Save the updated user
        $user->save();

        // Redirect with success message
        return redirect()->route('editUser', $user->id)->with('success', 'User updated successfully!');
    }


    // User login
    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Invalid login credentials'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'msg' => "Logged In Successfully",
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
