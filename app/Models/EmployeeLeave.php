<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeLeave extends Model
{
    protected $table = 'employeeleaves';
    protected $fillable = [
    'employee_id',
    'leave_type',
    'start_date',
    'end_date',
    'reason',
    'status', // if you have a default like 'pending'
];

public function employee()
{
    return $this->belongsTo(Employee::class,'employee_id');
}

}
