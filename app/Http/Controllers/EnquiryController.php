<?php

namespace App\Http\Controllers;

use App\Services\EnquiryService;
use App\Enums\EnquiryStatus;
use App\Enums\EnquiryType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EnquiryController extends Controller
{
    protected EnquiryService $enquiryService;

    public function __construct(EnquiryService $enquiryService)
    {
        $this->enquiryService = $enquiryService;
    }

    // Store new enquiry from website
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
            'type' => 'nullable|in:' . implode(',', EnquiryType::values())
        ]);

        try {
            $enquiry = $this->enquiryService->createEnquiry($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Enquiry submitted successfully',
                'data' => $enquiry
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit enquiry',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get all enquiries for admin
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15);
        $status = $request->get('status', 'all');
        $type = $request->get('type', 'all');
        
        $enquiries = $this->enquiryService->getAllEnquiries($perPage, $status, $type);
        
        return response()->json([
            'success' => true,
            'data' => $enquiries,
            'statistics' => $this->enquiryService->getStatistics()
        ]);
    }

    // Get single enquiry
    public function show(int $id): JsonResponse
    {
        try {
            $enquiry = $this->enquiryService->getEnquiryById($id);
            
            return response()->json([
                'success' => true,
                'data' => $enquiry
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Enquiry not found'
            ], 404);
        }
    }

    // Update enquiry (status, admin notes, type)
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'sometimes|in:' . implode(',', EnquiryStatus::values()),
            'type' => 'sometimes|in:' . implode(',', EnquiryType::values()),
            'admin_notes' => 'nullable|string',
            'replied' => 'sometimes|boolean'
        ]);

        try {
            $enquiry = $this->enquiryService->updateEnquiry($id, $validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Enquiry updated successfully',
                'data' => $enquiry
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update enquiry'
            ], 500);
        }
    }

    // Delete enquiry
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->enquiryService->deleteEnquiry($id);
            
            return response()->json([
                'success' => true,
                'message' => 'Enquiry deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete enquiry'
            ], 500);
        }
    }
}