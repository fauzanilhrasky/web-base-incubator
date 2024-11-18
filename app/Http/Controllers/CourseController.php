<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Material;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(6);

        return view("layouts.admin.course.index", compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentors = User::where('role', 'mentor')->get();
        return view('layouts.admin.course.create', compact('mentors'));
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
            'mentor_id' => 'required|exists:users,id',
            'price' => 'required',
            'isPaid' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Course::create($input);

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */

    //  show admin
    public function show(Course $course)
    {
        $materials = $course->materials()->with('assignments')->get();
        $enrolledUsers = $course->payments()->where('status', 'completed')->with('user')->get()->pluck('user');

        return view('layouts.admin.course.show', compact('course', 'materials', 'enrolledUsers'));
    }


    // showmaterial mentor
    public function showMaterial(Course $course)
    {

        $materials = $course->materials;
        $enrolledUsers = $course->payments()->where('status', 'completed')->with('user')->get()->pluck('user');
        return view('layouts.mentor.CourseMentor.showmaterial', compact('course', 'materials', 'enrolledUsers'));
    }

    // User upload submission

     public function addSubmissions($id)
    {
        
        $assignment = Assignment::with('userSubmissions')->findOrFail($id);

        
        return view('layouts.user.assignment.add', compact('assignment'));
    }
    public function submitAssignment(Request $request, $assignmentId)
    {
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,zip|max:2048',
            'link' => 'nullable|url',
        ]);
    
        // Handle file or link submission
        if ($request->submission_method == 'file') {
            $fileName = null;
    
            if ($request->hasFile('file')) {
                $fileName = time() . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('uploads'), $fileName);
            }
    
            UserSubmission::create([
                'user_id' => auth()->id(),
                'assignment_id' => $assignmentId,
                'file' => $fileName,
                'link' => null,
            ]);
        } elseif ($request->submission_method == 'link') {
            UserSubmission::create([
                'user_id' => auth()->id(),
                'assignment_id' => $assignmentId,
                'file' => null,
                'link' => $request->link,
            ]);
        }
    
        return redirect()->route('assignments.add', $assignmentId)
                         ->with('success', 'Your assignment has been successfully submitted!');
    }


public function updateAssignment(Request $request, $assignmentId)
{
    $request->validate([
        'file' => 'nullable|mimes:pdf,doc,docx,zip|max:2048',
    ]);

    $submission = UserSubmission::where('assignment_id', $assignmentId)
                                ->where('user_id', auth()->id())
                                ->first();

    if ($request->hasFile('file')) {
        $fileName = time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('uploads'), $fileName);

        // Update the file
        $submission->update(['file' => $fileName]);
    }

    return redirect()->route('assignments.add', $assignmentId)
                     ->with('success', 'Your assignment has been successfully updated!');
}



    public function download(UserSubmission $submission)
    {
        $filePath = public_path('uploads/user_submissions/' . $submission->file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'File not found.');
    }

    // admin review user submission
    public function reviewSubmissions($courseId, $materialId, $assignmentId) {
        $assignment = Assignment::findOrFail($assignmentId);
        $submissions = UserSubmission::where('assignment_id', $assignmentId)->with('user')->get();
    
        return view('layouts.admin.assignment.review', compact('assignment', 'submissions', 'courseId', 'materialId'));
    }

    // admin update status submission, grade ,and comment
    public function updateSubmission(Request $request, $submissionId) {
        $request->validate([
            'status' => 'required|string',
            'passing_grade' => 'nullable|integer',
            'comment' => 'nullable|string',
        ]);

        $submission = UserSubmission::findOrFail($submissionId);
        $submission->update([
            'status' => $request->status,
            'passing_grade' => $request->passing_grade,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Submission updated successfuly');
    }

    //detail/show users
    public function showdetail(Course $course)
    {
        $materials = $course->materials;

        // Retrieve all assignments and check if the user has submitted each one
        foreach ($materials as $material) {
            foreach ($material->assignments as $assignment) {
                $assignment->userSubmission = UserSubmission::where('user_id', auth()->id())
                    ->where('assignment_id', $assignment->id)
                    ->first();
            }
        }

        return view('layouts.user.course.showdetail', compact('course', 'materials'));
    }


    public function showCourseUser(Course $course)
    {

        $materials = $course->materials;
        return view('layouts.admin.course.show', compact('course', 'materials'));
    }

    public function detail(Course $course)
    {
        $materials = $course->materials;

        $isEnrolled = Payment::where('course_id', $course->id)->where('user_id', Auth::id())->where('status', 'completed')->exists();
        return view('layouts.user.course.detail', compact('course', 'materials', 'isEnrolled'));
    }

    public function homeMaterial()
    {
        $mentor = auth()->user();

        $courses = Course::where('mentor_id', $mentor->id)->get();

        return view('layouts.mentor.CourseMentor.course_material', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $mentors = User::where('role', 'mentor')->get();
        return view('layouts.admin.course.edit', compact('course', 'mentors'));
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
            'mentor_id' => 'required|exists:users,id',
            'price' => 'required',
            'isPaid' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $course->update($input);

        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }

    /**
     * Show the form for adding material to the specified course.
     */
    public function createMaterial(Course $course)
    {
        return view('layouts.admin.material.create', compact('course'));
    }


    /**
     * Store material for the specified course.
     */
    public function storeMaterial(Request $request, Course $course)
    {
        $request->validate([
            'materials.*.title' => 'required',
            'materials.*.content' => 'required',
            'materials.*.file' => 'nullable|file|mimes:png,jpg,pdf,doc,docx|max:2048',
        ]);

        foreach ($request->materials as $materialData) {
            $materialInput = $materialData;

            if (isset($materialData['file'])) {
                $file = $materialData['file'];
                $destinationPath = 'files/';
                $materialFile = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $materialFile);
                $materialInput['file'] = $materialFile;
            }

            $materialInput['course_id'] = $course->id;

            Material::create($materialInput);
        }

        return redirect()->route('course.index')->with('success', 'Materials added successfully.');
    }


    public function editMaterial(Course $course, Material $material)
    {
        return view('layouts.admin.material.edit', compact('course', 'material'));
    }


    public function destroyMaterial(Course $course, Material $material)
    {
        $material->delete(); // Menghapus data material
        return redirect()->route('CourseMentor.showmaterial', $course->id)->with('success', 'Material deleted successfully.');
    }



    public function updateMaterial(Request $request, Course $course, Material $material)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'nullable|file|mimes:png,jpg,pdf,doc,docx|max:2048',
        ]);

        // Siapkan input untuk diupdate
        $input = $request->all();

        // Jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($material->file) {
                $oldFilePath = public_path('files/' . $material->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Simpan file baru
            $file = $request->file('file');
            $materialFile = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files'), $materialFile);
            $materialInput['file'] = $materialFile;
        }

        // Update material dengan data baru
        $material->update($input);

        return redirect()->route('course.show', $course->id)->with('success', 'Material updated successfully.');
    }

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = Auth::user();

        $existingPayment = Payment::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->where('status', 'completed')
            ->first();

        if ($existingPayment) {
            return redirect()->route('my.courses')->with('info', 'You are already enrolled in this course.');
        }

        if (!$course->isPaid) {
            Payment::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
                'amount' => 0,
                'status' => 'completed',
                'payment_proof' => null,
            ]);

            return redirect()->route('my.courses')->with('success', 'You have successfully enrolled in this course!');
        }

        return redirect()->route('checkout', $courseId)->withErrors(['Course is not free. Please proceed to checkout.']);
    }


}
