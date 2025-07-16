<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//admin
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === 'admin') {
        session(['admin_logged_in' => true]);
        return redirect('/admin/dashboard');
    } else {
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
})->name('login.submit');

// Admin dashboard
Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('login');
    }
    return view('dashboard');
});


Route::get('/logout', function () {
    session()->forget('admin_logged_in');
    return redirect()->route('login');
});

Route::get('/admin/hr/add', function () {
    return view('add-hr');
});

use App\Http\Controllers\HrController;

Route::get('/admin/hr/add', [HrController::class, 'create']);
Route::post('/admin/hr/store', [HrController::class, 'store'])->name('hr.store');

use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/admin/hr/view', [HrController::class, 'index'])->name('hr.index');
Route::get('/admin/hr/toggle-status/{id}', [HrController::class, 'toggleStatus'])->name('hr.toggle');

use App\Http\Controllers\LeaveController;

Route::get('/admin/leave/add', [LeaveController::class, 'create'])->name('leave.create');
Route::post('/admin/leave/store', [LeaveController::class, 'store'])->name('leave.store');

Route::get('/admin/leave/view', [LeaveController::class, 'index'])->name('leave.index');
Route::get('/admin/leave/edit/{id}', [LeaveController::class, 'edit'])->name('leave.edit');
Route::post('/admin/leave/update/{id}', [LeaveController::class, 'update'])->name('leave.update');
Route::get('/admin/leave/delete/{id}', [LeaveController::class, 'destroy'])->name('leave.delete');

use App\Http\Controllers\DepartmentController;

Route::get('/admin/department/add', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/admin/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/admin/department/view', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/admin/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
Route::post('/admin/department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
Route::get('/admin/department/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');

use App\Http\Controllers\AdminEmployeeController;

Route::get('/admin/employees/view', [AdminEmployeeController::class, 'view'])->name('employee.view');
Route::post('/admin/employees/filter', [AdminEmployeeController::class, 'filterByDepartment'])->name('employee.filter');


//hr
use App\Http\Controllers\HrAuthController;

Route::get('/hr/login', [HrAuthController::class, 'showLoginForm'])->name('hr.login');
Route::post('/hr/login', [HrAuthController::class, 'login'])->name('hr.login.submit');
Route::get('/hr/dashboard', [HrAuthController::class, 'dashboard'])->name('hr.dashboard');
Route::get('/hr/logout', [HrAuthController::class, 'logout'])->name('hr.logout');

use App\Http\Controllers\HrEmployeeController;

Route::get('/hr/employees/add', [HrEmployeeController::class, 'create'])->name('hr.employee.create');
Route::post('/hr/employees/store', [HrEmployeeController::class, 'store'])->name('hr.employee.store');
Route::get('/hr/employees/view', [HrEmployeeController::class, 'index'])->name('hr.employee.index');
//hr can toggle(active or inactive) employee
Route::get('/hr/employees/toggle/{id}', [HrEmployeeController::class, 'toggleStatus'])->name('hr.employee.toggle');
Route::get('/hr/employees/performance', [HrEmployeeController::class, 'performance'])->name('hr.employee.performance');
Route::get('/hr/employees/{id}/rate', [HrEmployeeController::class, 'showRatingForm'])->name('hr.employee.rate');
Route::post('/hr/employees/{id}/rate', [HrEmployeeController::class, 'saveRating'])->name('hr.employee.rate.save');
Route::get('/hr/employees/view-performance', [HrEmployeeController::class, 'viewRating'])->name('hr.employee.viewperformance');
Route::get('/hr/attendance', [HrEmployeeController::class, 'attendance'])->name('hr.attendance');
Route::post('/hr/attendance/toggle/{id}', [HrEmployeeController::class, 'toggleAttendance'])->name('hr.attendance.toggle');
Route::get('/hr/attendance/view', [HrEmployeeController::class, 'viewAttendance'])->name('hr.attendance.view');

Route::post('/hr/attendance/store', [HrEmployeeController::class, 'storeAttendance'])->name('hr.attendance.store');

Route::get('/hr/leaves/manage', [HrEmployeeController::class, 'manageLeaveRequests'])->name('hr.leaves.manage');
Route::post('/hr/leaves/toggle/{id}', [HrEmployeeController::class, 'toggleLeaveStatus'])->name('hr.leaves.toggle');
Route::get('/hr/leaves/viewall', [HrEmployeeController::class, 'viewAllLeaves'])->name('hr.leaves.viewall');


//employee
use App\Http\Controllers\EmployeeAuthController;

Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/employee/login', [EmployeeAuthController::class, 'login'])->name('employee.login.submit');
Route::get('/employee/dashboard', [EmployeeAuthController::class, 'dashboard'])->name('employee.dashboard');
Route::view('/employee/about', 'employee.about')->name('employee.about');
Route::get('/employee/profile', [EmployeeAuthController::class, 'profile'])->name('employee.profile');
Route::get('/employee/profile/edit', [EmployeeAuthController::class, 'editProfile'])->name('employee.profile.edit');
Route::put('/employee/profile/update', [EmployeeAuthController::class, 'updateProfile'])->name('employee.profile.update');
Route::get('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

use App\Http\Controllers\LeaveEmployeeController;

Route::get('/employee/leave/request', [LeaveEmployeeController::class, 'create'])->name('leave.request');
Route::post('/employee/leave/request', [LeaveEmployeeController::class, 'store'])->name('leave.submit');
Route::get('/employee/leave/status', [LeaveEmployeeController::class, 'status'])->name('leave.status');

use App\Http\Controllers\PerformanceController;

Route::get('/employee/performance', [PerformanceController::class, 'view'])->name('employee.performance');
