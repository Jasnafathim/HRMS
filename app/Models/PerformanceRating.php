<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceRating extends Model
{
    protected $fillable = ['employee_id', 'rating'];
}
