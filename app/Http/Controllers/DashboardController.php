<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalDepartment = Department::count();
        $totalEmployee = Employee::count();
        return view('dashboard', compact('totalDepartment', 'totalEmployee'));
    }
}
