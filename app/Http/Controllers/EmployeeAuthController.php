<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\PerformanceRating;
use App\Models\EmployeeLeave;
use Illuminate\Support\Carbon;

//use Illuminate\Support\Carbon;
//use App\Models\EmployeeLeave;
//use App\Models\PerformanceRating;


class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('employee.employeelogin');
    }

     
public function login(Request $request)
{
    $employee = Employee::where('email', $request->email)->first();

    if (!$employee || $employee->password !== $request->password) {
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    if ($employee->status == 'blocked') {
        return redirect()->back()->with('error', 'Your account is blocked.');
    }

    Session::put('employee_logged_in', true);
    Session::put('employee_id', $employee->id);

    return redirect()->route('employee.dashboard');
}


//     public function dashboard()
//     {
//         if (!session('employee_logged_in')) {
//         return redirect()->route('employee.login');
//     }

//     $employee = Employee::find(session('employee_id'));
//     return view('employee.dashboard', compact('employee'));
//     }

    public function logout()
    {
        Session::forget('employee_logged_in');
        Session::forget('employee_id');

        return redirect()->route('employee.login');
    }

     public function profile()
{
    $employee = Employee::find(session('employee_id'));
    return view('employee.profile', compact('employee'));
}

// public function dashboard()
// {
//     $employeeId = session('employee_id');

//     $employee = Employee::find($employeeId);

//     // Get rating
//     $rating = PerformanceRating::where('employee_id', $employeeId)->value('rating') ?? 0;

//     // Leave data
//     //$totalLeaves = EmployeeLeave::where('employee_id', $employeeId)->count();


// $employeeId = session('employee_id');

// $leaves = EmployeeLeave::where('employee_id', $employeeId)->get();

// // Calculate total leave days
// $totalLeaveDays = 0;

// foreach ($leaves as $leave) {
//     $start = Carbon::parse($leave->start_date);
//     $end = Carbon::parse($leave->end_date);

//     $days = $start->diffInDays($end) + 1; // +1 to include start date
//     $totalLeaveDays += $days;
// }
// return view('employee.dashboard', compact('employee', 'rating', 'totalLeaveDays', 'pendingLeaves'));


//     $pendingLeaves = EmployeeLeave::where('employee_id', $employeeId)
//                                   ->where('status', 'pending')
//                                   ->count();

//     return view('employee.dashboard', compact('employee', 'rating', 'totalLeaves', 'pendingLeaves'));
// }


public function dashboard()
{
    $employeeId = session('employee_id');
    $employee = Employee::find($employeeId);

    // Get rating
    $rating = PerformanceRating::where('employee_id', $employeeId)->value('rating') ?? 0;

    // Get all leaves
    $leaves = EmployeeLeave::where('employee_id', $employeeId)->get();

    // Calculate total leave days
    $totalLeaveDays = 0;
    foreach ($leaves as $leave) {
        $start = Carbon::parse($leave->start_date);
        $end = Carbon::parse($leave->end_date);
        $days = $start->diffInDays($end) + 1;
        $totalLeaveDays += $days;
    }

    // Count pending leaves
    $pendingLeaves = EmployeeLeave::where('employee_id', $employeeId)
                                  ->where('status', 'pending')
                                  ->count();

    return view('employee.dashboard', compact(
        'employee',
        'rating',
        'totalLeaveDays',
        'pendingLeaves'
    ));
}


   
public function editProfile()
{
    $employee = Employee::find(session('employee_id'));
    return view('employee.edit-profile', compact('employee'));
}

public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $employee = Employee::find(session('employee_id'));

    $employee->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->route('employee.profile')->with('success', 'Profile updated successfully!');
}

}

