<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'employee_jobs';

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id');
    }

    public function jobHistories()
    {
        return $this->hasMany(JobHistory::class, 'job_id');
    }
}
