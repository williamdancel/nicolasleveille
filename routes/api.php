<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;

// Enquiries routes
Route::post('/enquiries', [EnquiryController::class, 'store']);
Route::get('/admin/enquiries', [EnquiryController::class, 'index']);
Route::get('/admin/enquiries/{id}', [EnquiryController::class, 'show']);
Route::put('/admin/enquiries/{id}', [EnquiryController::class, 'update']);
Route::delete('/admin/enquiries/{id}', [EnquiryController::class, 'destroy']);
Route::post('/admin/enquiries/bulk-update', [EnquiryController::class, 'bulkUpdate']);

// Evaluation routes
Route::post('/evaluation', [EvaluationController::class, 'store']);
Route::get('/admin/evaluations', [EvaluationController::class, 'index']);
Route::get('/admin/evaluations/{id}', [EvaluationController::class, 'show']);
Route::put('/admin/evaluations/{id}', [EvaluationController::class, 'update']);
Route::delete('/admin/evaluations/{id}', [EvaluationController::class, 'destroy']);
Route::delete('/admin/evaluations/{id}/force', [EvaluationController::class, 'forceDestroy']);
Route::post('/admin/evaluations/{id}/restore', [EvaluationController::class, 'restore']);