<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
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
        $students = StudentResource::collection(Student::paginate(5));
        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }

    public function edit() {
        $students = StudentResource::collection(Student::paginate(5));
        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }

    public function store() {
        $students = StudentResource::collection(Student::paginate(5));
        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }

    public function destroy() {
        $students = StudentResource::collection(Student::paginate(5));
        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }
}
