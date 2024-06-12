<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\ClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index() {
        $students = StudentResource::collection(Student::paginate(10));
        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }

    public function create() {
        $classes = ClassesResource::collection(Classes::all());
        return inertia::render('Students/Create', [
            'classes' => $classes,
        ]);
    }

    public function edit() {
        
    }

    public function store(StoreStudentRequest $request) {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function destroy() {
        
    }
}
