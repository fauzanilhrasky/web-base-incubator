<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\Payment;
use App\Models\User;
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
    public function show(Course $course)
    {

        $materials = $course->materials; // Retrieve the materials for the course
        return view('layouts.admin.course.show', compact('course', 'materials'));
    }

    //detail users
    public function showdetail(Course $course)
    {

        $materials = $course->materials; // Retrieve the materials for the course
        return view('layouts.admin.course.showdetail', compact('course', 'materials'));
    }

    public function showCourseUser(Course $course)
    {

        $materials = $course->materials; // Retrieve the materials for the course
        return view('layouts.admin.course.show', compact('course', 'materials'));
    }

    public function detail(Course $course)
    {
        $materials = $course->materials;

        $isEnrolled = Payment::where('course_id', $course->id)->where('user_id', Auth::id())->where('status', 'completed')->exists();
        return view('layouts.admin.course.detail',compact('course','materials','isEnrolled'));
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
        $mentors = User::where('role', 'mentor')->get();  // Fetch mentors for the edit form
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
            'mentor_id' => 'required|exists:users,id', // Mentor validation
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
