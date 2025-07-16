<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr;
use App\Models\Department;
use App\Models\Employee;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalHRs = Hr::count(); // 👈 get HR count        
        $totalDepartments = Department::count();
        $totalEmployees = Employee::count();        
        return view('dashboard', compact('totalHRs', 'totalDepartments','totalEmployees'));
    }
}
