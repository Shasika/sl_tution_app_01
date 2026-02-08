<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InstituteController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\BatchController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\ReportController;

Route::apiResource('institutes', InstituteController::class);
Route::apiResource('branches', BranchController::class);
Route::apiResource('halls', HallController::class);
Route::apiResource('grades', GradeController::class)->only(['index', 'store', 'update', 'destroy']);
Route::apiResource('subjects', SubjectController::class)->only(['index', 'store', 'update', 'destroy']);
Route::apiResource('courses', CourseController::class);
Route::apiResource('batches', BatchController::class);
Route::apiResource('sessions', SessionController::class);
Route::apiResource('students', StudentController::class);

Route::get('/attendance/sessions/{sessionId}', [AttendanceController::class, 'show']);
Route::post('/attendance', [AttendanceController::class, 'store']);

Route::get('/invoices', [InvoiceController::class, 'index']);
Route::post('/invoices', [InvoiceController::class, 'store']);
Route::get('/invoices/{invoiceId}', [InvoiceController::class, 'show']);

Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);

Route::get('/exams', [ExamController::class, 'index']);
Route::post('/exams', [ExamController::class, 'store']);
Route::get('/exams/{examId}/marks', [ExamController::class, 'marks']);
Route::post('/exams/{examId}/marks', [ExamController::class, 'storeMarks']);

Route::get('/reports/collections', [ReportController::class, 'collections']);
Route::get('/reports/arrears', [ReportController::class, 'arrears']);
Route::get('/reports/class-performance', [ReportController::class, 'classPerformance']);
