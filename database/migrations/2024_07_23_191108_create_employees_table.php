<?php

use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->date("hire_date");
            $table->foreignIdFor(Job::class)->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->cascadeOnDelete();
            $table->foreignIdFor(Employee::class)->nullable()->nullOnDelete();
            $table->decimal('salary', 10, 2);
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
