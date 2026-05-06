<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { enquiries } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Enquiries',
                href: enquiries(),
            },
        ],
    },
});

// Mock data 
const enquiriesData = ref([
    {
        id: 1,
        firstName: 'John',
        lastName: 'Doe',
        phone: '+819 1234 5678',
        email: 'john.doe@example.com',
        type: 'Enquiry',
        status: 'Pending',
        message: 'I am interested in the 3-bedroom apartment downtown. Is it still available?',
        createdDate: '2024-01-15',
        updatedDate: '2024-01-15'
    },
    {
        id: 2,
        firstName: 'Jane',
        lastName: 'Smith',
        phone: '+819 2345 6789',
        email: 'jane.smith@example.com',
        type: 'Evaluation',
        status: 'In Progress',
        message: 'I would like to schedule a property evaluation for my house in the suburbs.',
        createdDate: '2024-01-14',
        updatedDate: '2024-01-15'
    },
    {
        id: 3,
        firstName: 'Robert',
        lastName: 'Johnson',
        phone: '+819 3456 7890',
        email: 'robert.j@example.com',
        type: 'Enquiry',
        status: 'Awaiting Customer',
        message: 'What are the property tax rates in this area? Need more information.',
        createdDate: '2024-01-13',
        updatedDate: '2024-01-14'
    },
    {
        id: 4,
        firstName: 'Maria',
        lastName: 'Garcia',
        phone: '+819 4567 8901',
        email: 'maria.garcia@example.com',
        type: 'Evaluation',
        status: 'Closed',
        message: 'Property evaluation completed. Thank you for your service!',
        createdDate: '2024-01-12',
        updatedDate: '2024-01-13'
    },
    {
        id: 5,
        firstName: 'David',
        lastName: 'Wilson',
        phone: '+819 5678 9012',
        email: 'david.wilson@example.com',
        type: 'Enquiry',
        status: 'Cancelled',
        message: 'Found another property, please cancel my enquiry.',
        createdDate: '2024-01-11',
        updatedDate: '2024-01-12'
    }
]);

const getTypeClass = (type: string) => {
    const classes = {
        'Enquiry': 'bg-purple-100 text-purple-800',
        'Evaluation': 'bg-indigo-100 text-indigo-800'
    };

    return classes[type as keyof typeof classes] || 'bg-gray-100 text-gray-800';
};

const getStatusClass = (status: string) => {
    const classes = {
        'Pending': 'bg-yellow-100 text-yellow-800',
        'In Progress': 'bg-blue-100 text-blue-800',
        'Awaiting Customer': 'bg-orange-100 text-orange-800',
        'Closed': 'bg-green-100 text-green-800',
        'Cancelled': 'bg-red-100 text-red-800'
    };

    return classes[status as keyof typeof classes] || 'bg-gray-100 text-gray-800';
};

// Placeholder functions
const viewEnquiry = (enquiry: any) => {
    console.log('View enquiry:', enquiry);
    // TODO: Implement view functionality
};

const editEnquiry = (enquiry: any) => {
    console.log('Edit enquiry:', enquiry);
    // TODO: Implement edit functionality
};
</script>

<template>
    <Head title="Enquiries" />

    <div
        class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
    >
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Property Enquiries</h2>
                <p class="text-sm text-gray-600 mt-1">Manage property enquiries and evaluation requests</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                First Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Last Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Message
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="enquiry in enquiriesData" :key="enquiry.id" class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ enquiry.firstName }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ enquiry.lastName }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ enquiry.phone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ enquiry.email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span :class="['px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full', getTypeClass(enquiry.type)]">
                                    {{ enquiry.type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span :class="['px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full', getStatusClass(enquiry.status)]">
                                    {{ enquiry.status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs">
                                <div class="truncate" :title="enquiry.message">
                                    {{ enquiry.message }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ new Date(enquiry.createdDate).toLocaleDateString() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ new Date(enquiry.updatedDate).toLocaleDateString() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <button
                                        @click="viewEnquiry(enquiry)"
                                        class="text-green-600 hover:text-green-900 transition-colors flex items-center gap-1"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View
                                    </button>
                                    <button
                                        @click="editEnquiry(enquiry)"
                                        class="text-blue-600 hover:text-blue-900 transition-colors flex items-center gap-1"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">{{ enquiriesData.length }}</span> enquiries
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Previous
                        </button>
                        <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>