<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function detail(Course $course)
    {
        return view('layouts.admin.course.detail',compact('course'));
    }

    public function adminHome()
    {
        return view('layouts.admin.home');
    }

    public function adminMentor()
    {
        return view('layouts.mentor.home');
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}
