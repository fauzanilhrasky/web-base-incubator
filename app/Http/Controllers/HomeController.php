<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use App\Models\User;

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
    public function index(Request $request)
    {
        $category = $request->get('category');  // Get the selected category from the query string
        $courses = Course::when($category, function ($query, $category) {
            return $query->where('category', $category); 
        })->get();

        return view('home', compact('courses'));
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
