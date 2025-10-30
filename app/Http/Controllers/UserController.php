<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpge,png,gif',
            'email' => 'required|email|unique:users',
            'phone_number' => 'digits:10|required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('uploads/users', 'public');
            $validated['photo'] = $photo;
        }
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $defaultRole = Role::where('name', 'admin')->first();
        if ($defaultRole) {
            $user->roles()->attach($defaultRole->id);
        }



        return redirect()->route("login")->with('success', 'Account Successfully created');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
