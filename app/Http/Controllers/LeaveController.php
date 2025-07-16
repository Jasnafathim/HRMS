<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function create()
    {
        return view('add-leave');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_name' => 'required|string|max:100',
            'leave_number' => 'required|integer|min:1',
        ]);

        Leave::create([
            'leave_name' => $validated['leave_name'],
            'leave_number' => $validated['leave_number'],
        ]);

        return redirect()->back()->with('success', 'Leave type added successfully!');
    }

    public function index()
{
    $leaves = Leave::all();
    return view('view-leave', compact('leaves'));
}

public function edit($id)
{
    $leave = Leave::findOrFail($id);
    return view('edit-leave', compact('leave'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'leave_name' => 'required|string',
        'leave_number' => 'required|integer|min:1',
    ]);

    $leave = Leave::findOrFail($id);
    $leave->update([
        'leave_name' => $request->leave_name,
        'leave_number' => $request->leave_number,
    ]);

    return redirect()->route('leave.index')->with('success', 'Leave updated successfully.');
}

public function destroy($id)
{
    Leave::findOrFail($id)->delete();
    return redirect()->route('leave.index')->with('success', 'Leave deleted successfully.');
}
public function status()
{
    $employeeId = session('employee_id');
    $leaves = Leave::where('employee_id', $employeeId)->get();

    return view('employee.leave-status', compact('leaves'));
}

}
