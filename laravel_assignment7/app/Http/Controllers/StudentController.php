<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'course_id' => 'nullable|integer|exists:courses,id',
        ]);

        $students = Student::with('course');

        if ($request->filled('search')) {
            $students->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('course_id')) {
            $students->where('course_id', $request->course_id);
        }

        $students = $students->latest()->paginate(10)->withQueryString();
        $courses = Course::orderBy('title')->get();

        return view('students.index', compact('students', 'courses'));
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'phone' => 'nullable|string|max:30',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return redirect()->route('students.edit', $student);
    }

    public function edit(Student $student)
    {
        $courses = Course::orderBy('title')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('students', 'email')->ignore($student->id)],
            'phone' => 'nullable|string|max:30',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
