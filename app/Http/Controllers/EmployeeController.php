<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('employee.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|integer',
            'department_id' => 'required|integer'
        ]);

        Employee::create([
            'name' => $request->name,
            'posistion' => $request->position,
            'salary' => $request->salary,
            'department_id' => $request->department_id
        ]);

        return redirect(route('employee.index', absolute: false))->with('message', 'Employee Successfully Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('employee.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'salary' => 'required|integer',
            'department_id' => 'integer'
        ]);

        $employee->update([
            'name' => $request->name,
            'posistion' => $request->position,
            'salary' => $request->salary,
            'department_id' => $request->department_id
        ]);

        return redirect(route('employee.index', absolute: false))->with('message', 'Department Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect(route('employee.index', absolute: false))->with('message', 'Department Successfully Deleted.');
    }
}
