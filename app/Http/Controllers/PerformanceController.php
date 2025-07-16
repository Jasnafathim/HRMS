<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class PerformanceController extends Controller
{
    public function view()
    {
        $employee = Employee::find(session('employee_id'));
        return view('employee.performance', compact('employee'));
    }
}
