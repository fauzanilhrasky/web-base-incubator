<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);

        return view("layouts.admin.course.index", compact('courses'))
            ->with('i', (request()->input('page' . 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            'category' => 'required',
            'isPaid' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Course::create($input);

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('layouts.admin.course.show',compact('course'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('layouts.admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'isPaid'=> 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['$image']);
        }

        $course->update($input);

        
        return redirect()->route('course.index')->with('success', 'Course Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }

    public function createMaterial(Course $course) {
        return view('layouts.admin.material.create', compact('course'));
    }

    public function storeMaterial(Request $request, Course $course) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'nullable|file|mimes:png,jpg,pdf,doc,docx|max:2048'
        ]);

        $input = $request->all();
        $input['course_id'] = $course->id;

        if ($file = $request->file('file')) {
            $destinationPath = 'files/';
            $materialFile = date('YmdHis') . '.' .$file->getClientOriginalExtension();
            $file->move($destinationPath,$materialFile);
            $input['file'] = '$materialFile';
        }

        Material::create($input);

        return redirect()->route('course.index', $course->id)->with('success','Material added sucessfully');
    }
}
