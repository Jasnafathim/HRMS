<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Employee;

class Employee extends Model
{
    protected $fillable = [
    'name', 'email', 'password', 'department', 
    'date_of_joining', 'phone', 'address','status','rating'
];

public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function leaves()
{
    return $this->hasMany(EmployeeLeave::class);
}

}
