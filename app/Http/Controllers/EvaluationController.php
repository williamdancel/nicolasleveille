<?php

namespace App\Http\Controllers;

use App\Services\EvaluationService;
use App\Enums\EvaluationStatus;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EvaluationController extends Controller
{
    protected EvaluationService $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    // Store new evaluation from frontend
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'message' => 'required|string|min:10',
        ]);

        try {
            $evaluation = $this->evaluationService->createEvaluation($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Evaluation request submitted successfully',
                'data' => $evaluation
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit evaluation request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get all evaluations for admin
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15);
        $status = $request->get('status', 'all');
        $trashed = $request->get('trashed', 'without');
        
        $evaluations = $this->evaluationService->getAllEvaluations($perPage, $status, $trashed);
        
        return response()->json([
            'success' => true,
            'data' => $evaluations,
            'statistics' => $this->evaluationService->getStatistics()
        ]);
    }

    // Get single evaluation
    public function show(Request $request, int $id): JsonResponse
    {
        try {
            $withTrashed = $request->get('with_trashed', false);
            $evaluation = $this->evaluationService->getEvaluationById($id, $withTrashed);
            
            return response()->json([
                'success' => true,
                'data' => $evaluation
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Evaluation not found'
            ], 404);
        }
    }

    // Update evaluation
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'sometimes|in:' . implode(',', EvaluationStatus::values()),
            'admin_notes' => 'nullable|string',
            'estimated_value' => 'nullable|numeric|min:0|max:999999999.99'
        ]);

        try {
            $evaluation = $this->evaluationService->updateEvaluation($id, $validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Evaluation updated successfully',
                'data' => $evaluation
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update evaluation'
            ], 500);
        }
    }

    // Soft delete evaluation
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->evaluationService->deleteEvaluation($id);
            
            return response()->json([
                'success' => true,
                'message' => 'Evaluation moved to trash'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete evaluation'
            ], 500);
        }
    }

}