<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students=Students::all();
        return view('students.index',compact('students'));
    }
    
    public function create()
    {
        return view('students.create');
    }

    public function show()
    {
        return 'ini show';
    }

    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gander' => 'required',
            'class' => 'required',
        ]);
        
        Students::create($request->all());

        return redirect() ->route('students.index')->with('succes', 'Berhaslil menambahkan.');
    }

    public function edit (Students $students)
    {
        return view('students.edit',compact('students'));
    }

    public function destroy(Students $students)
    {
        $students->delete();
        return redirect()->route('students.index'->with('success', 'Kelas berhasil dihapus'));
    }
}