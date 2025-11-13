<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = teacher::all();
        return view('admin.Teacher.teacher', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.Teacher.addteacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|size:10|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gender' => 'required|in:male,female,other',
            'DOB' => 'date|required',
            'Address' => 'required|string',
            'password' => 'required',
            'email' => 'required|email'
        ]);
        $validation['password'] = Hash::make($validation['password']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teachers', 'public');
            $validation['photo'] = $path;
        }

        $teacher = teacher::create($validation);

        $defaultRole = Role::where('name', 'teacher')->first();
        if ($defaultRole) {
            $teacher->roles()->attach($defaultRole->id);
        }

        return redirect()->back()->with('success', 'Teacher registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        return view('admin.Teacher.viewtec', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {

        return view('admin.Teacher.edittec', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, teacher $teacher)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'phone_number' => 'required|size:10|string',
            'DOB' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'Address' => 'required|string'
        ]);
        if ($request->hasFile('photo')) {
            if ($teacher->photo && storage::disk('public')->exists($teacher->photo)) {
                storage::disk('public')->delete($teacher->photo);
            }

            $path = $request->file('photo')->store('teachers', 'public');
            $validation['photo'] = $path;
        }else{
            $validation['photo'] = $teacher->photo;
        }

        $teacher->update($validation);

                return redirect()->route('teacher')->with('success', 'Teacher data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher $teacher)
    {
        if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
            Storage::disk('public')->delete($teacher->photo);
        }
        $teacher->delete();
        return response()->json([
            "message" => $teacher->name . ' deleted successfully!'
        ]);
    }
}
