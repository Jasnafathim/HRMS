<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use App\Models\Leave;

class LeaveEmployeeController extends Controller
{
    public function create()
    {
        $leaveTypes = Leave::all();
        return view('employee.leave-request',compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'reason'     => 'required',
        ]);

        EmployeeLeave::create([
            'employee_id' => session('employee_id'),
            'leave_type'  => $request->leave_type,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'reason'      => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Leave request submitted successfully!');
    }

    public function status()
{
    $employeeId = session('employee_id'); // Get logged-in employee
    $leaves = EmployeeLeave::where('employee_id', $employeeId)->get();

    return view('employee.leave-status', compact('leaves'));
}

}
