<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\EmployeeLeave;
//use Illuminate\Support\Facades\Auth;


class HrAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('hr.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);

    $hr = Hr::where('name', $request->name)
            ->where('email', $request->email)
            ->first();

    if ($hr) {
        // ✅ Log in using Laravel's auth system
        Auth::guard('hr')->login($hr);

        return redirect()->route('hr.dashboard');
    }

    return back()->withErrors([
        'login_error' => 'Invalid email or name.',
    ]);
}

    

//     public function dashboard()
// {
//     $hr = Auth::guard('hr')->user(); // ✅ retrieve current logged-in HR

//     if (!$hr) {
//         return redirect()->route('hr.login');
//     }

//     return view('hr.dashboard', ['hrName' => $hr->name]);
// }

public function dashboard()
{
    $hr = Auth::guard('hr')->user();

    if (!$hr) {
        return redirect()->route('hr.login');
    }

    // Count employees only in HR's department
    $totalEmployees = Employee::where('department', $hr->department)->count();

    // Count pending leaves of employees in HR's department
    $pendingLeaves = EmployeeLeave::where('status', 'pending')
                        ->whereHas('employee', function ($query) use ($hr) {
                            $query->where('department', $hr->department);
                        })
                        ->count();

    return view('hr.dashboard', [
        'hrName' => $hr->name,
        'totalEmployees' => $totalEmployees,
        'pendingLeaves' => $pendingLeaves
    ]);
}



    public function logout()
{
    Auth::guard('hr')->logout(); // ✅ logs out HR
    return redirect()->route('hr.login');
}


}

