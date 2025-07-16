<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class Hr extends Authenticatable
{
    protected $table = 'hrs';
    protected $fillable = ['name', 'email', 'department', 'joining_date', 'phone', 'address','status'];

}
