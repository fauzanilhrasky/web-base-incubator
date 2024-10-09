<?php

namespace App\Http\Controllers;

use App\Models\hakakses;
use Illuminate\Http\Request;

class HakaksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menangani pencarian berdasarkan ID
        $search = $request->get('search');
        if ($search) {
            // Jika ada pencarian, gunakan paginate dengan pencarian
            $hakakses = Hakakses::where('name', 'like', "%{$search}%")->paginate(15);
        } else {
            // Jika tidak ada pencarian, ambil semua data dengan paginate
            $hakakses = Hakakses::paginate(20);
        }

        // Mengirim data ke view
        return view('layouts.hakakses.index', ['hakakses' => $hakakses]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hakakses $hakakses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $hakakses = hakakses::find($id);
        return view('layouts.hakakses.edit', compact('hakakses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hakakses $hakakses, $id)
    {
        //
        $hakakses = hakakses::find($id);
        $hakakses->role = $request->role;
        $hakakses->save();
        return redirect()->route('hakakses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hakakses $hakakses)
    {
        //
        $hakakses->delete();
    }
}
