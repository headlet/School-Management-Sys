<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $classes = classes::select('class')->distinct()->get();
        return view('admin.classes.class', compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.newclass');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "Class" => 'required',
            "Section" => 'required|string'
        ]);

        classes::create($validation);

        return redirect()->route('classes')->with("success" ,'Class successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show($class)
    {

        $section = classes::where('Class', $class)->get();

        return view('admin.classes.viewclass', compact('section', "class"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classes $classes)
    {
        //
    }
}
