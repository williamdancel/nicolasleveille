<?php

namespace App\Models;

use App\Enums\EnquiryStatus;
use App\Enums\EnquiryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'message',
        'type',
        'status',
        'admin_notes',
        'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'type' => EnquiryType::class,
        'status' => EnquiryStatus::class
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    // Scope for pending enquiries
    public function scopePending($query)
    {
        return $query->where('status', EnquiryStatus::PENDING->value);
    }

    // Scope for in-progress enquiries
    public function scopeInProgress($query)
    {
        return $query->where('status', EnquiryStatus::IN_PROGRESS->value);
    }

    // Scope for awaiting customer
    public function scopeAwaitingCustomer($query)
    {
        return $query->where('status', EnquiryStatus::AWAITING_CUSTOMER->value);
    }

    // Scope for closed enquiries
    public function scopeClosed($query)
    {
        return $query->where('status', EnquiryStatus::CLOSED->value);
    }

    // Scope for cancelled enquiries
    public function scopeCancelled($query)
    {
        return $query->where('status', EnquiryStatus::CANCELLED->value);
    }

    // Scope for visitation type
    public function scopeVisitation($query)
    {
        return $query->where('type', EnquiryType::VISITATION->value);
    }

    // Scope for enquiry type
    public function scopeEnquiry($query)
    {
        return $query->where('type', EnquiryType::ENQUIRY->value);
    }

    // Helper methods
    public function markAsInProgress(): void
    {
        $this->update(['status' => EnquiryStatus::IN_PROGRESS]);
    }

    public function markAsAwaitingCustomer(): void
    {
        $this->update(['status' => EnquiryStatus::AWAITING_CUSTOMER]);
    }

    public function markAsClosed(): void
    {
        $this->update(['status' => EnquiryStatus::CLOSED]);
    }

    public function markAsCancelled(): void
    {
        $this->update(['status' => EnquiryStatus::CANCELLED]);
    }

    public function markAsReplied(): void
    {
        $this->update([
            'status' => EnquiryStatus::IN_PROGRESS,
            'replied_at' => now()
        ]);
    }

    public function isPending(): bool
    {
        return $this->status === EnquiryStatus::PENDING;
    }

    public function isInProgress(): bool
    {
        return $this->status === EnquiryStatus::IN_PROGRESS;
    }

    public function isAwaitingCustomer(): bool
    {
        return $this->status === EnquiryStatus::AWAITING_CUSTOMER;
    }

    public function isClosed(): bool
    {
        return $this->status === EnquiryStatus::CLOSED;
    }

    public function isCancelled(): bool
    {
        return $this->status === EnquiryStatus::CANCELLED;
    }

    public function isVisitation(): bool
    {
        return $this->type === EnquiryType::VISITATION;
    }

    public function isEnquiry(): bool
    {
        return $this->type === EnquiryType::ENQUIRY;
    }
}