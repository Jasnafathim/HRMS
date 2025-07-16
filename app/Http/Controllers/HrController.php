<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr;


class HrController extends Controller
{
   public function create()
    {
        return view('add-hr');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:hrs',
            'department' => 'required|string',
            'joining_date' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        Hr::create($validated);

        return redirect('/admin/hr/add')->with('success', 'HR added successfully!');
    }

    
public function index()
{
    $hrs = Hr::all();
    $blockedCount = Hr::where('status', 0)->count();   // status 0 = blocked
    $unblockedCount = Hr::where('status', 1)->count(); // status 1 = unblocked

    return view('view-hr', compact('hrs', 'blockedCount', 'unblockedCount'));
}

public function toggleStatus($id)
{
    $hr = Hr::findOrFail($id);
    $hr->status = !$hr->status; // toggle
    $hr->save();

    return redirect()->back()->with('success', 'HR status updated.');
}


}
