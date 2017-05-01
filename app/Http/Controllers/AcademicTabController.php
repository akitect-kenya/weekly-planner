<?php

namespace Planner\Http\Controllers;

use Planner\Department;
use Planner\Grade;
use Planner\Subject;

class AcademicTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Subjects
        $subjects = Subject::all();

        // Departments
        $departments = Department::all();

        // Grades
        $grades = Grade::all();

        return view('academic.index', compact('subjects', 'departments', 'grades'));
    }
}
