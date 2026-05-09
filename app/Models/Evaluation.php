<?php

namespace App\Models;

use App\Enums\EvaluationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'address',
        'message',
        'status',
        'admin_notes',
        'estimated_value',
        'evaluated_at'
    ];

    protected $casts = [
        'evaluated_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'estimated_value' => 'decimal:2',
        'status' => EvaluationStatus::class
    ];

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', EvaluationStatus::PENDING->value);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', EvaluationStatus::IN_PROGRESS->value);
    }

    public function scopeAwaitingCustomer($query)
    {
        return $query->where('status', EvaluationStatus::AWAITING_CUSTOMER->value);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', EvaluationStatus::COMPLETED->value);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', EvaluationStatus::CANCELLED->value);
    }

    // Helper methods
    public function markAsInProgress(): void
    {
        $this->update(['status' => EvaluationStatus::IN_PROGRESS]);
    }

    public function markAsAwaitingCustomer(): void
    {
        $this->update(['status' => EvaluationStatus::AWAITING_CUSTOMER]);
    }

    public function markAsCompleted(float $estimatedValue = null): void
    {
        $data = ['status' => EvaluationStatus::COMPLETED];
        if ($estimatedValue !== null) {
            $data['estimated_value'] = $estimatedValue;
            $data['evaluated_at'] = now();
        }
        $this->update($data);
    }

    public function markAsCancelled(): void
    {
        $this->update(['status' => EvaluationStatus::CANCELLED]);
    }

    public function isPending(): bool
    {
        return $this->status === EvaluationStatus::PENDING;
    }

    public function isInProgress(): bool
    {
        return $this->status === EvaluationStatus::IN_PROGRESS;
    }

    public function isCompleted(): bool
    {
        return $this->status === EvaluationStatus::COMPLETED;
    }
}