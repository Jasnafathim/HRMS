<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function create()
{
    return view('add-department');
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|string|unique:departments']);

    Department::create(['name' => $request->name]);

    return redirect()->back()->with('success', 'Department added successfully!');
}

public function index()
{
    $departments = Department::all();
    return view('view-department', compact('departments'));
}

public function edit($id)
{
    $department = Department::findOrFail($id);
    return view('edit-department', compact('department'));
}

public function update(Request $request, $id)
{
    $request->validate(['name' => 'required|string|unique:departments,name,'.$id]);

    Department::findOrFail($id)->update(['name' => $request->name]);

    return redirect()->route('department.index')->with('success', 'Department updated successfully.');
}

public function destroy($id)
{
    Department::findOrFail($id)->delete();
    return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
}
}
