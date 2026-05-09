<?php

namespace App\Services;

use App\Models\Enquiry;
use App\Enums\EnquiryStatus;
use App\Enums\EnquiryType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EnquiryService
{
    public function createEnquiry(array $data): Enquiry
    {
        return Enquiry::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'message' => $data['message'],
            'type' => $data['type'] ?? EnquiryType::ENQUIRY->value,
            'status' => EnquiryStatus::PENDING->value
        ]);
    }

    public function getAllEnquiries(
        int $perPage = 15, 
        ?string $statusFilter = null,
        ?string $typeFilter = null
    ): LengthAwarePaginator {
        $query = Enquiry::query()->orderBy('created_at', 'desc');
        
        if ($statusFilter && $statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }
        
        if ($typeFilter && $typeFilter !== 'all') {
            $query->where('type', $typeFilter);
        }
        
        return $query->paginate($perPage);
    }

    public function getEnquiryById(int $id): ?Enquiry
    {
        return Enquiry::findOrFail($id);
    }

    public function updateEnquiry(int $id, array $data): Enquiry
    {
        $enquiry = Enquiry::findOrFail($id);
        
        $updateData = [];
        
        if (isset($data['status']) && in_array($data['status'], EnquiryStatus::values())) {
            $updateData['status'] = $data['status'];
        }
        
        if (isset($data['type']) && in_array($data['type'], EnquiryType::values())) {
            $updateData['type'] = $data['type'];
        }
        
        if (isset($data['admin_notes'])) {
            $updateData['admin_notes'] = $data['admin_notes'];
        }
        
        if (isset($data['replied']) && $data['replied'] === true) {
            $updateData['status'] = EnquiryStatus::IN_PROGRESS->value;
            $updateData['replied_at'] = now();
        }
        
        $enquiry->update($updateData);
        
        return $enquiry->fresh();
    }

    public function deleteEnquiry(int $id): bool
    {
        $enquiry = Enquiry::findOrFail($id);
        return $enquiry->delete();
    }

    public function getStatistics(): array
    {
        return [
            'total' => Enquiry::count(),
            'pending' => Enquiry::pending()->count(),
            'in_progress' => Enquiry::inProgress()->count(),
            'awaiting_customer' => Enquiry::awaitingCustomer()->count(),
            'closed' => Enquiry::closed()->count(),
            'cancelled' => Enquiry::cancelled()->count(),
            'visitation' => Enquiry::visitation()->count(),
            'enquiry' => Enquiry::enquiry()->count(),
        ];
    }
}