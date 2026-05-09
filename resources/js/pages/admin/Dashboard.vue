<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { dashboard } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});

const enquiryTotal = ref<number>(0)
const evaluationTotal = ref<number>(0)
const isLoading = ref(true)

// Helper function for fetch requests
const fetchAPI = async <T = any>(url: string, options: RequestInit = {}): Promise<T> => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
    
    const defaultOptions: RequestInit = {
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken
        },
        credentials: 'same-origin'
    }
    
    const mergedOptions: RequestInit = {
        ...defaultOptions,
        ...options,
        headers: {
            ...defaultOptions.headers as Record<string, string>,
            ...options.headers as Record<string, string>
        }
    }
    
    const response = await fetch(url, mergedOptions)
    
    if (!response.ok) {
        const error = await response.json()

        throw new Error(error.message || 'Request failed')
    }
    
    return response.json()
}

const loadStatistics = async () => {
    isLoading.value = true

    try {
        // Load enquiries statistics
        const enquiriesResponse = await fetchAPI('/api/admin/enquiries?per_page=1')
        enquiryTotal.value = enquiriesResponse.statistics.total
        
        // Load evaluations statistics
        const evaluationsResponse = await fetchAPI('/api/admin/evaluations?per_page=1')
        evaluationTotal.value = evaluationsResponse.statistics.total
    } catch (error) {
        console.error('Failed to load statistics:', error)
    } finally {
        isLoading.value = false
    }
}

const formatNumber = (num: number): string => {
    return new Intl.NumberFormat().format(num)
}

onMounted(() => {
    loadStatistics()
})
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-x-auto rounded-xl p-4">
        <!-- Loading State -->
        <div v-if="isLoading" class="flex justify-center items-center h-64">
            <div class="text-gray-500 text-lg">Loading statistics...</div>
        </div>

        <!-- Dashboard Content -->
        <div v-else>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Total Enquiries Card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium uppercase tracking-wide">Total Enquiries</p>
                            <p class="text-5xl font-bold mt-3">{{ formatNumber(enquiryTotal) }}</p>
                        </div>
                        <div class="bg-blue-400 bg-opacity-30 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Evaluations Card -->
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg shadow-lg p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-100 text-sm font-medium uppercase tracking-wide">Total Evaluations</p>
                            <p class="text-5xl font-bold mt-3">{{ formatNumber(evaluationTotal) }}</p>
                        </div>
                        <div class="bg-emerald-400 bg-opacity-30 rounded-full p-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>