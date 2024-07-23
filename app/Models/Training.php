<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_trainings', 'training_id', 'employee_id')
            ->withPivot('trainingDate', 'status')
            ->withTimestamps();
    }
}
