<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function jobHistories()
    {
        return $this->hasMany(JobHistory::class, 'employee_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'employee_id');
    }

    public function performanceReviews()
    {
        return $this->hasMany(Performance::class, 'employee_id');
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_id');
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'employee_trainings', 'employee_id', 'training_id')
            ->withPivot('trainingDate', 'status')
            ->withTimestamps();
    }
}
