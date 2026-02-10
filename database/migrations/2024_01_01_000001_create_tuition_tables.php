<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->json('settings_json')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches');
            $table->string('name');
            $table->unsignedInteger('capacity')->default(0);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->nullable()->constrained('institutes');
            $table->foreignId('branch_id')->nullable()->constrained('branches');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('role')->default('student');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('reg_no');
            $table->string('full_name');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('school')->nullable();
            $table->foreignId('grade_id')->nullable()->constrained('grades');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('relationship')->nullable();
            $table->timestamps();
        });

        Schema::create('guardian_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained('guardians');
            $table->foreignId('student_id')->constrained('students');
            $table->boolean('is_primary')->default(false);
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('teacher_id')->nullable()->constrained('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('hall_id')->nullable()->constrained('halls');
            $table->string('name');
            $table->unsignedInteger('capacity')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('batches');
            $table->unsignedTinyInteger('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('batches');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('hall_id')->nullable()->constrained('halls');
            $table->string('status')->default('scheduled');
            $table->string('qr_token')->nullable();
            $table->timestamp('qr_expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('batch_id')->constrained('batches');
            $table->timestamp('enrolled_at');
            $table->string('status')->default('active');
            $table->timestamp('left_at')->nullable();
            $table->timestamps();
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('sessions');
            $table->foreignId('student_id')->constrained('students');
            $table->string('status');
            $table->foreignId('marked_by')->nullable()->constrained('users');
            $table->timestamp('marked_at')->nullable();
            $table->string('method')->default('manual');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('fee_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('type');
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('LKR');
            $table->json('rules_json')->nullable();
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('student_id')->constrained('students');
            $table->string('invoice_no');
            $table->date('issue_date');
            $table->date('due_date');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('late_fee', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->string('status')->default('unpaid');
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices');
            $table->string('description');
            $table->foreignId('batch_id')->nullable()->constrained('batches');
            $table->foreignId('session_id')->nullable()->constrained('sessions');
            $table->unsignedInteger('qty');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices');
            $table->decimal('amount', 10, 2);
            $table->string('method');
            $table->string('reference')->nullable();
            $table->timestamp('paid_at');
            $table->foreignId('received_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('batch_id')->constrained('batches');
            $table->string('title');
            $table->date('exam_date');
            $table->timestamps();
        });

        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams');
            $table->foreignId('student_id')->constrained('students');
            $table->decimal('score', 5, 2);
            $table->decimal('max_score', 5, 2);
            $table->string('grade_letter')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('channel');
            $table->string('to');
            $table->string('template_key');
            $table->json('payload_json');
            $table->string('status')->default('queued');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });

        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('action');
            $table->string('entity_type');
            $table->unsignedBigInteger('entity_id');
            $table->json('before_json')->nullable();
            $table->json('after_json')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('marks');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('fee_plans');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('batches');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('guardian_student');
        Schema::dropIfExists('guardians');
        Schema::dropIfExists('students');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('users');
        Schema::dropIfExists('halls');
        Schema::dropIfExists('branches');
        Schema::dropIfExists('institutes');
    }
};
