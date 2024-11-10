<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function create(Course $course, Material $material)
    {
        return view('layouts.admin.assignment.create', compact('course', 'material'));
    }

    
    // upload assignment
    public function showUpload(Course $course, Material $material)
    {
       
        $assignment = Assignment::where('material_id', $material->id)->first();
    
        
        return view('layouts.admin.assignment.upload', compact('course', 'material', 'assignment'));
    }

    public function detailUpload(Course $course, Material $material)
    {
        $assignment = Assignment::where('material_id', $material->id)->first();
    
        return view('layouts.mentor.assignment.upload', compact('course', 'material', 'assignment'));
    }

    public function userUpload(Course $course, Material $material)
    {
        $assignment = Assignment::where('material_id', $material->id)->first();
    
        return view('layouts.user.assignment.upload', compact('course', 'material', 'assignment'));
    }
    
    public function userAdd($assignmentId)
    {
        $assignment = Assignment::find($assignmentId);
    
        if (!$assignment) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
    
        return view('layouts.user.assignment.add', compact('assignment'));
    }
    

    public function store(Request $request, Course $course, Material $material)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'due_date' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation
    ]);

    $assignmentData = [
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'material_id' => $material->id,
    ];

    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $destinationPath = 'assignments/'; // Set the destination path
        $assignmentFile = date('YmdHis') . '.' . $file->getClientOriginalExtension(); // Create a unique file name
        $file->move($destinationPath, $assignmentFile); // Move the file to the destination

        // Save the file path in the assignment data
        $assignmentData['file'] = $assignmentFile;
    }

    Assignment::create($assignmentData);

    return redirect()->route('course.show', $course->id)->with('success', 'Assignment created successfully.');
}

}

