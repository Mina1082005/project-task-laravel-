<?php
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Student;
class DashboardController extends Controller {
 public function index() { return view('dashboard.index',['coursesCount'=>Course::count(),'studentsCount'=>Student::count()]); }
}
