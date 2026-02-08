<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $instituteId = DB::table('institutes')->insertGetId([
            'name' => 'Lakbima Institute',
            'code' => 'LAKB',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $branchId = DB::table('branches')->insertGetId([
            'institute_id' => $instituteId,
            'name' => 'Colombo 07',
            'address' => 'Ward Place',
            'phone' => '011 123 4567',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('halls')->insert([
            'branch_id' => $branchId,
            'name' => 'Hall A',
            'capacity' => 120,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $gradeId = DB::table('grades')->insertGetId([
            'name' => 'Grade 10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $subjectId = DB::table('subjects')->insertGetId([
            'name' => 'Mathematics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $teacherId = DB::table('users')->insertGetId([
            'institute_id' => $instituteId,
            'branch_id' => $branchId,
            'name' => 'Kasun Silva',
            'email' => 'teacher@demo.lk',
            'phone' => '077 111 2222',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            ['name' => 'Super Admin', 'slug' => 'super_admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Institute Admin', 'slug' => 'institute_admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Teacher', 'slug' => 'teacher', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cashier', 'slug' => 'cashier', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $courseId = DB::table('courses')->insertGetId([
            'institute_id' => $instituteId,
            'subject_id' => $subjectId,
            'grade_id' => $gradeId,
            'teacher_id' => $teacherId,
            'title' => 'Grade 10 Maths',
            'description' => 'Weekly Sunday session',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $batchId = DB::table('batches')->insertGetId([
            'course_id' => $courseId,
            'branch_id' => $branchId,
            'hall_id' => 1,
            'name' => 'Batch A',
            'capacity' => 120,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $studentId = DB::table('students')->insertGetId([
            'institute_id' => $instituteId,
            'reg_no' => 'LAKB-' . now()->format('Y') . '-0001',
            'full_name' => 'Anu Senanayake',
            'phone' => '077 888 9912',
            'grade_id' => $gradeId,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrollments')->insert([
            'student_id' => $studentId,
            'batch_id' => $batchId,
            'enrolled_at' => now(),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
