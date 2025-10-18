<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::all();

        return view('admin.Student.student', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Student.addstudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'full_name'    => 'required|string|max:255',
            'registration' => 'required|string|max:50|unique:students,registration',
            'phone_number' => 'required|string|size:10',
            'photo'        => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'dob'          => 'required|date',
            'doa'          => 'required|date',
            'gender'       => 'required|in:male,female,other',
            'class'        => 'required|string|max:20',
            'address'      => 'required|string|max:255',
        ]);


        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
            $validation['photo'] = $path;
        }

        $student = student::create($validation);

        $defaultRole = Roles::where('name', 'student')->first();
        if ($defaultRole) {
            $student->roles()->attach($defaultRole->id);
        }

        return redirect()->back()->with('success', 'Student registered successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        return view('admin.Student.viewstd', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        return view('admin.Student.editstd', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        $validation = $request->validate([
            'full_name'    => 'required|string|max:255',
            'registration' => 'required|string|max:50',
            'phone_number' => 'required|string|size:10',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'dob'          => 'required|date',
            'doa'          => 'required|date',
            'gender'       => 'required|in:male,female,other',
            'class'        => 'required|string|max:20',
            'address'      => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }

            $path = $request->file('photo')->store('students', 'public');
            $validation['photo'] = $path;
        } else {
            $validation['photo'] = $student->photo;
        }

        $student->update($validation);

        return redirect()->route('student')->with('success', 'Student data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return response()->json([
            "message" => $student->full_name . ' deleted successfully!'
        ]);
    }
}
