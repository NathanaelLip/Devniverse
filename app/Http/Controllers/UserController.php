<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validate and update user data
        $validatedData = $request->validate([
            'name' => 'string|max:25|' . Rule::unique('users')->ignore($id) . '|regex:/^(?![0-9]*$)[a-zA-Z0-9._-]+$/',
            'email' => 'string|email|max:255|' . Rule::unique('users')->ignore($id),
            'paypal_amount' => 'string',
            'isVerified' => 'boolean',
            'isAdmin' => 'boolean',
            'isMod' => 'boolean',
            'isBanned' => 'boolean',
            'ban_reason' => 'nullable|string',
            // Add validation rules for other fields as needed
        ]);

        $user->update($validatedData);

        return response()->json($user);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
