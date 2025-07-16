<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\EmployeeLeave;


class HrEmployeeController extends Controller
{
    public function create()
    {
        return view('hr.add-employee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'department' => 'required',
            'address' => 'nullable',
        ]);

        Employee::create($request->all());

        return redirect()->back()->with('success', 'Employee added successfully.');
    }

    public function index()
    {
        $hr = Auth::guard('hr')->user();
        if (!$hr) 
        {
            abort(403, 'Unauthorized');
        }
        $employees = Employee::where('department', $hr->department)->get(); // must exist
        return view('hr.view-employee', compact('employees'));

    }

public function toggleStatus($id)
{
    $employee = Employee::findOrFail($id);
    $employee->status = $employee->status === 'unblocked' ? 'blocked' : 'unblocked';
    $employee->save();

    return redirect()->back()->with('success', 'Employee status updated.');
}

public function performance()
{
    $hr = Auth::guard('hr')->user();
    $employees = Employee::where('department', $hr->department)->get();

    return view('hr.performance', compact('employees'));
}

public function showRatingForm($id)
{
    $hr = Auth::guard('hr')->user();
    $employee = Employee::where('id', $id)
                        ->where('department', $hr->department)
                        ->first();

    if (!$employee) {
        abort(403, 'Unauthorized to rate this employee.');
    }

    return view('hr.rate-employee', compact('employee'));
}


public function saveRating(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5'
    ]);

    $employee = Employee::findOrFail($id);
    $employee->rating = $request->rating;
    $employee->save();

    return redirect()->route('hr.employee.performance')->with('success', 'Rating updated successfully.');
}

public function viewRating()
{
    $hr = Auth::guard('hr')->user();
    $employees = Employee::where('department', $hr->department)
                         ->select('name', 'email', 'department', 'rating')
                         ->get();

    return view('hr.viewperformance', compact('employees'));
}


public function attendance()
{
    $hr = Auth::guard('hr')->user();
    $employees = Employee::where('department', $hr->department)->get();

    return view('hr.attendance', compact('employees'));
}

public function toggleAttendance($id)
{
    $employee = Employee::findOrFail($id);
    $employee->attendance = $employee->attendance === 'Present' ? 'Absent' : 'Present';
    $employee->save();

    return redirect()->back()->with('success', 'Attendance updated.');
}

public function viewAttendance(Request $request)
{
    $hr = Auth::guard('hr')->user();
    $attendances = collect();

    if ($request->has('date')) {
        $attendances = Attendance::whereDate('date', $request->date)
            ->whereHas('employee', function ($query) use ($hr) {
                $query->where('department', $hr->department);
            })
            ->with('employee')
            ->get();
    }

    return view('hr.attendance-view', compact('attendances'));
}

public function storeAttendance(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'attendance' => 'required|array',
    ]);

    foreach ($request->attendance as $empId => $status) {
        Attendance::updateOrCreate(
            ['employee_id' => $empId, 'date' => $request->date],
            ['status' => $status]
        );
    }

    return redirect()->back()->with('success', 'Attendance saved successfully.');
}

public function manageLeaveRequests()
{
    $hr = Auth::guard('hr')->user();

    $leaveRequests = EmployeeLeave::with('employee')
        ->whereHas('employee', function ($query) use ($hr) {
            $query->where('department', $hr->department);
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('hr.manage-leaves', compact('leaveRequests'));
}

public function toggleLeaveStatus($id)
{
    $leave = EmployeeLeave::findOrFail($id);

    // Toggle: approved ↔ rejected
    $leave->status = $leave->status === 'approved' ? 'rejected' : 'approved';
    $leave->save();

    return redirect()->back()->with('success', 'Leave status updated.');
}


public function viewAllLeaves()
{
    $hr = Auth::guard('hr')->user();

    $leaves = EmployeeLeave::with('employee')
        ->whereHas('employee', function ($query) use ($hr) {
            $query->where('department', $hr->department);
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('hr.view-all-leaves', compact('leaves'));
}


}
