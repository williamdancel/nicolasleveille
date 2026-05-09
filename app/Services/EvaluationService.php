<?php

namespace App\Services;

use App\Models\Evaluation;
use App\Enums\EvaluationStatus;
use Illuminate\Pagination\LengthAwarePaginator;

class EvaluationService
{
    public function createEvaluation(array $data): Evaluation
    {
        return Evaluation::create([
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'message' => $data['message'],
            'status' => EvaluationStatus::PENDING->value
        ]);
    }

    public function getAllEvaluations(
        int $perPage = 15,
        ?string $statusFilter = null,
        ?string $trashedFilter = 'without'
    ): LengthAwarePaginator {
        $query = Evaluation::query()->orderBy('created_at', 'desc');
        
        // Handle soft delete filtering
        if ($trashedFilter === 'with') {
            $query->withTrashed();
        } elseif ($trashedFilter === 'only') {
            $query->onlyTrashed();
        }
        
        if ($statusFilter && $statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }
        
        return $query->paginate($perPage);
    }

    public function getEvaluationById(int $id, bool $withTrashed = false): ?Evaluation
    {
        if ($withTrashed) {
            return Evaluation::withTrashed()->findOrFail($id);
        }
        return Evaluation::findOrFail($id);
    }

    public function updateEvaluation(int $id, array $data): Evaluation
    {
        $evaluation = Evaluation::findOrFail($id);
        
        $updateData = [];
        
        if (isset($data['status']) && in_array($data['status'], EvaluationStatus::values())) {
            $updateData['status'] = $data['status'];
        }
        
        if (isset($data['admin_notes'])) {
            $updateData['admin_notes'] = $data['admin_notes'];
        }
        
        if (isset($data['estimated_value'])) {
            $updateData['estimated_value'] = $data['estimated_value'];
            $updateData['evaluated_at'] = now();
        }
        
        $evaluation->update($updateData);
        
        return $evaluation->fresh();
    }

    public function deleteEvaluation(int $id): bool
    {
        $evaluation = Evaluation::findOrFail($id);
        return $evaluation->delete();
    }

    public function getStatistics(): array
    {
        return [
            'total' => Evaluation::count(),
            'pending' => Evaluation::pending()->count(),
            'in_progress' => Evaluation::inProgress()->count(),
            'awaiting_customer' => Evaluation::awaitingCustomer()->count(),
            'completed' => Evaluation::completed()->count(),
            'cancelled' => Evaluation::cancelled()->count(),
            'deleted' => Evaluation::onlyTrashed()->count(),
            'with_estimated_value' => Evaluation::whereNotNull('estimated_value')->count(),
        ];
    }
}