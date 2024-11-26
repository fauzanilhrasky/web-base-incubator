<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\UserSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AssignmentController extends Controller
{
    public function create(Course $course, Material $material)
    {
        return view('layouts.admin.assignment.create', compact('course', 'material'));
    }

    // assessment
    public function assessment()
{
    return view('layouts.user.assignment.assessment');
}


    // upload assignment user
    public function showUpload(Course $course, Material $material)
    {
        $assignment = Assignment::where('material_id', $material->id)->first();

        if (!$assignment) {
            abort(404, 'Assignment not found');
        }

        $userSubmissions = UserSubmission::where('assignment_id', $assignment->id)
            ->with('user')
            ->get()
            ->map(function ($submission) use ($assignment) {
                $dueDate = Carbon::parse($assignment->due_date);
                $submittedAt = Carbon::parse($submission->created_at);
                $submission->time_difference = $submittedAt->diffForHumans($dueDate, [
                    'parts' => 2, // Limit the output to hours and minutes
                    'syntax' => $submittedAt->greaterThan($dueDate) ? Carbon::DIFF_RELATIVE_TO_NOW : Carbon::DIFF_ABSOLUTE
                ]);

                $submission->is_early = $submittedAt->lessThan($dueDate);
                return $submission;
            });

        return view('layouts.user.assignment.upload', compact('course', 'material', 'assignment', 'userSubmissions'));
    }


    // upload assignment mentor
    public function detailUpload(Course $course, Material $material)
    {
        $assignment = Assignment::where('material_id', $material->id)->first();

        return view('layouts.mentor.assignment.upload', compact('course', 'material', 'assignment'));
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

    public function edit(Course $course, Material $material, Assignment $assignment)
    {
        return view('layouts.user.assignment.edit', compact('course', 'material', 'assignment'));
    }

    public function update(Request $request, Course $course, Material $material, Assignment $assignment)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation
        ]);

        // Update assignment data
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->due_date = $request->due_date;

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if it exists
            if ($assignment->file && Storage::exists('assignments/' . $assignment->file)) {
                Storage::delete('assignments/' . $assignment->file);
            }

            $file = $request->file('file');
            $destinationPath = 'assignments/';
            $assignmentFile = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $assignmentFile); // Move file to destination

            $assignment->file = $assignmentFile;
        }

        $assignment->save();

        return redirect()->route('assignment.upload', $course->id)
            ->with('success', 'Assignment updated successfully.');
    }



}

