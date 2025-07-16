<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class AdminEmployeeController extends Controller
{
    public function view()
{
    $departments = \App\Models\Employee::select('department')->distinct()->pluck('department');
    return view('view-employee', compact('departments'));
}

public function filterByDepartment(Request $request)
{
    $request->validate(['department' => 'required']);

    $departments = \App\Models\Employee::select('department')->distinct()->pluck('department');
    $employees = \App\Models\Employee::where('department', $request->department)->get();

    return view('view-employee', compact('departments', 'employees'));
}


}
