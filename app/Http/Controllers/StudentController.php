<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\ClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index(Request $request) {
        $studentsQuery = Student::search($request);
        $classes = ClassesResource::collection(Classes::all());

        $students = StudentResource::collection(
            $studentsQuery->paginate(10)
        );
        
        return Inertia::render('Students/Index', [
            'students' => $students,
            'classes' => $classes,
            'class_id' => $request->class_id ?? '',
            'search' => $request->search ?? '',
        ]);
    }

    public function create() {
        $classes = ClassesResource::collection(Classes::all());
        return inertia::render('Students/Create', [
            'classes' => $classes,
        ]);
    }

    public function edit(Student $student) {
        $classes = ClassesResource::collection(Classes::all());
        return inertia::render('Students/Edit', [
            'classes' => $classes,
            'student' => StudentResource::make($student),
        ]);
    }

    public function store(StoreStudentRequest $request) {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function update(UpdateStudentRequest $request, Student $student) {
        $student->update($request->validated());

        return redirect()->route('students.index');
    }
    public function destroy(Student $student) {
        $student->delete();

        return redirect()->route('students.index');
    }
}
