<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { evaluation } from '@/routes'

// Define interfaces/types
interface Evaluation {
  id: number
  fullname: string
  phone: string
  email: string
  address: string
  message: string
  status: 'pending' | 'in-progress' | 'awaiting_customer' | 'completed' | 'cancelled'
  admin_notes: string | null
  estimated_value: number | null
  evaluated_at: string | null
  created_at: string
  updated_at: string
  deleted_at: string | null
}

interface Statistics {
  total: number
  pending: number
  in_progress: number
  awaiting_customer: number
  completed: number
  cancelled: number
  deleted?: number
  with_estimated_value: number
}

interface Pagination {
  current_page: number
  last_page: number
  per_page: number
  total: number
  prev_page_url: string | null
  next_page_url: string | null
  data: Evaluation[]
}

interface ApiResponse {
  success: boolean
  data: Pagination
  statistics: Statistics
  message?: string
}

interface EditForm {
  status: 'pending' | 'in-progress' | 'awaiting_customer' | 'completed' | 'cancelled'
  admin_notes: string
  estimated_value: number | null
}

defineOptions({
  layout: {
    breadcrumbs: [
      {
        title: 'Evaluations',
        href: typeof evaluation === 'function' ? evaluation() : '/admin/evaluations',
      },
    ],
  },
})

const evaluationsList = ref<Evaluation[]>([])
const statistics = ref<Statistics>({
  total: 0,
  pending: 0,
  in_progress: 0,
  awaiting_customer: 0,
  completed: 0,
  cancelled: 0,
  with_estimated_value: 0
})
const currentStatus = ref<string>('all')
const searchTerm = ref<string>('')
const pagination = ref<Pagination | any>({})
const selectedEvaluation = ref<Evaluation | null>(null)
let searchTimeout: ReturnType<typeof setTimeout> | null = null

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

const loadEvaluations = async (): Promise<void> => {
  try {
    const params = new URLSearchParams({
      status: currentStatus.value,
      search: searchTerm.value,
      page: String(pagination.value.current_page || 1)
    })
    
    const response = await fetchAPI<ApiResponse>(`/api/admin/evaluations?${params}`)
    evaluationsList.value = response.data.data
    statistics.value = response.statistics
    pagination.value = response.data
  } catch (error) {
    console.error('Failed to load evaluations:', error)
    alert('Failed to load evaluations: ' + (error as Error).message)
  }
}

const debouncedSearch = (): void => {
  if (searchTimeout) {
    clearTimeout(searchTimeout)
  }

  searchTimeout = setTimeout(() => {
    loadEvaluations()
  }, 500)
}

const deleteEvaluation = async (id: number): Promise<void> => {
  if (!confirm('Are you sure you want to delete this evaluation?')) {
return
}
  
  try {
    await fetchAPI(`/api/admin/evaluations/${id}`, {
      method: 'DELETE'
    })
    await loadEvaluations()

    if (selectedEvaluation.value?.id === id) {
      selectedEvaluation.value = null
    }
  } catch (error) {
    console.error('Failed to delete evaluation:', error)
    alert('Failed to delete evaluation: ' + (error as Error).message)
  }
}

const prevPage = (): void => {
  if (pagination.value.prev_page_url) {
    pagination.value.current_page--
    loadEvaluations()
  }
}

const nextPage = (): void => {
  if (pagination.value.next_page_url) {
    pagination.value.current_page++
    loadEvaluations()
  }
}

const getStatusClass = (status: string): string => {
  const classes: Record<string, string> = {
    pending: 'bg-yellow-100 text-yellow-800',
    'in-progress': 'bg-blue-100 text-blue-800',
    awaiting_customer: 'bg-purple-100 text-purple-800',
    completed: 'bg-green-100 text-green-800',
    cancelled: 'bg-red-100 text-red-800'
  }

  return classes[status] || 'bg-gray-100 text-gray-800'
}

const formatStatus = (status: string): string => {
  const statusMap: Record<string, string> = {
    pending: 'Pending',
    'in-progress': 'In Progress',
    awaiting_customer: 'Awaiting Customer',
    completed: 'Completed',
    cancelled: 'Cancelled'
  }

  return statusMap[status] || status
}

const formatDate = (date: string): string => {
  return new Date(date).toLocaleDateString()
}

const formatCurrency = (value: number | null): string => {
  if (value === null) {
return 'Not evaluated'
}

  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0
  }).format(value)
}

const editForm = ref<EditForm>({
  status: 'pending',
  admin_notes: '',
  estimated_value: null
})
const isUpdating = ref<boolean>(false)

const viewEvaluation = async (evaluation: Evaluation): Promise<void> => {
  selectedEvaluation.value = evaluation
  // Populate edit form
  editForm.value = {
    status: evaluation.status,
    admin_notes: evaluation.admin_notes || '',
    estimated_value: evaluation.estimated_value
  }
  
}

const updateEvaluation = async (): Promise<void> => {
  if (!selectedEvaluation.value) {
return
}
  
  isUpdating.value = true
  
  try {
    const updateData: any = {
      status: editForm.value.status,
      admin_notes: editForm.value.admin_notes
    }
    
    // Add estimated value if status is completed or if value is provided
    if (editForm.value.estimated_value !== null) {
      updateData.estimated_value = editForm.value.estimated_value
    }
    
    await fetchAPI(`/api/admin/evaluations/${selectedEvaluation.value.id}`, {
      method: 'PUT',
      body: JSON.stringify(updateData)
    })
    
    // Update local data
    if (selectedEvaluation.value) {
      selectedEvaluation.value.status = editForm.value.status
      selectedEvaluation.value.admin_notes = editForm.value.admin_notes

      if (editForm.value.estimated_value !== null) {
        selectedEvaluation.value.estimated_value = editForm.value.estimated_value
      }
    }
    
    await loadEvaluations()
    alert('Evaluation updated successfully')
    closeModal()
  } catch (error) {
    console.error('Failed to update evaluation:', error)
    alert('Failed to update evaluation: ' + (error as Error).message)
  } finally {
    isUpdating.value = false
  }
}

const closeModal = (): void => {
  selectedEvaluation.value = null
  editForm.value = {
    status: 'pending',
    admin_notes: '',
    estimated_value: null
  }
}

onMounted(() => {
  loadEvaluations()
})
</script>

<template>
  <div class="evaluation-manager">

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
      <div class="flex justify-between items-center flex-wrap gap-4">
        <div class="flex gap-4 flex-wrap">
          <!-- Status Filters -->
          <div class="flex items-center gap-2">
            <span class="text-sm font-medium text-gray-700">Status:</span>
            <select v-model="currentStatus" @change="loadEvaluations" class="border rounded-lg px-3 py-1">
              <option value="all">All</option>
              <option value="pending">Pending</option>
              <option value="in-progress">In Progress</option>
              <option value="awaiting_customer">Awaiting Customer</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        
        <div class="flex gap-2">
          <input 
            v-model="searchTerm" 
            type="text" 
            placeholder="Search by name, email, or phone..." 
            class="border rounded-lg px-4 py-2 w-80"
            @input="debouncedSearch"
          >
          <button @click="loadEvaluations" class="bg-[#b0884c] text-white px-4 py-2 rounded-lg hover:bg-[#96733f]">
            Refresh
          </button>
        </div>
      </div>
    </div>

    <!-- Evaluations Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property Info</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estimated Value</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="evaluation in evaluationsList" :key="evaluation.id" class="hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="text-sm font-medium text-gray-900">{{ evaluation.fullname }}</div>
                <div class="text-sm text-gray-500">{{ evaluation.email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ evaluation.phone }}</td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">{{ evaluation.address }}</div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">{{ evaluation.message }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getStatusClass(evaluation.status)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                  {{ formatStatus(evaluation.status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <span :class="evaluation.estimated_value ? 'text-green-600' : 'text-gray-400'">
                  {{ formatCurrency(evaluation.estimated_value) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(evaluation.created_at) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button @click="viewEvaluation(evaluation)" class="text-indigo-600 hover:text-indigo-900 mr-3">View</button>
                <button @click="deleteEvaluation(evaluation.id)" class="text-red-600 hover:text-red-900">Delete</button>
              </td>
            </tr>
            <tr v-if="evaluationsList.length === 0">
              <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                No evaluations found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
        <div class="flex justify-between items-center">
          <div class="text-sm text-gray-700">
            Showing {{ evaluationsList.length }} of {{ pagination.total }} results
          </div>
          <div class="flex gap-2">
            <button 
              @click="prevPage" 
              :disabled="!pagination.prev_page_url"
              class="px-3 py-1 border rounded disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50"
            >
              Previous
            </button>
            <span class="px-3 py-1 text-sm">
              Page {{ pagination.current_page }} of {{ pagination.last_page }}
            </span>
            <button 
              @click="nextPage" 
              :disabled="!pagination.next_page_url"
              class="px-3 py-1 border rounded disabled:opacity-50 disabled:cursor-not-allowed hover:bg-gray-50"
            >
              Next
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- View/Edit Modal -->
    <div v-if="selectedEvaluation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Evaluation Details</h2>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">✕</button>
          </div>
          
          <div class="space-y-4">
            <!-- Customer Information (Read Only) -->
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <p class="mt-1 text-gray-900">{{ selectedEvaluation.fullname }}</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <p class="mt-1 text-gray-900">{{ selectedEvaluation.phone }}</p>
              </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 text-gray-900">{{ selectedEvaluation.email }}</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Date Submitted</label>
                <p class="mt-1 text-gray-900">{{ formatDate(selectedEvaluation.created_at) }}</p>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700">Address</label>
              <div class="mt-1 p-3 bg-gray-50 rounded-lg">
                <p class="whitespace-pre-wrap text-gray-900">{{ selectedEvaluation.address }}</p>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700">Property Information</label>
              <div class="mt-1 p-3 bg-gray-50 rounded-lg">
                <p class="whitespace-pre-wrap text-gray-900">{{ selectedEvaluation.message }}</p>
              </div>
            </div>
            
            <!-- Editable Fields -->
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select v-model="editForm.status" class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]">
                  <option value="pending">Pending</option>
                  <option value="in-progress">In Progress</option>
                  <option value="awaiting_customer">Awaiting Customer</option>
                  <option value="completed">Completed</option>
                  <option value="cancelled">Cancelled</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700">Estimated Value</label>
                <input 
                  v-model="editForm.estimated_value" 
                  type="number" 
                  step="1000"
                  class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]"
                  placeholder="Enter estimated value"
                />
              </div>
            </div>
            
            <!-- Admin Notes -->
            <div>
              <label class="block text-sm font-medium text-gray-700">Admin Notes</label>
              <textarea 
                v-model="editForm.admin_notes" 
                rows="4" 
                class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]"
                placeholder="Add notes about this evaluation..."
              ></textarea>
            </div>
            
            <!-- Current Estimated Value Display -->
            <div v-if="selectedEvaluation.estimated_value && selectedEvaluation.evaluated_at" class="border-t pt-4">
              <label class="block text-sm font-medium text-gray-700">Evaluation Details</label>
              <div class="mt-1 p-3 bg-green-50 rounded-lg">
                <p class="text-sm text-gray-700">
                  <strong>Estimated Value:</strong> {{ formatCurrency(selectedEvaluation.estimated_value) }}
                </p>
                <p class="text-sm text-gray-700 mt-1">
                  <strong>Evaluated On:</strong> {{ formatDate(selectedEvaluation.evaluated_at) }}
                </p>
              </div>
            </div>
            
            <div v-if="selectedEvaluation.admin_notes" class="border-t pt-4">
              <label class="block text-sm font-medium text-gray-700">Saved Notes</label>
              <div class="mt-1 p-3 bg-gray-50 rounded-lg">
                <p class="whitespace-pre-wrap text-gray-600">{{ selectedEvaluation.admin_notes }}</p>
              </div>
            </div>
            
            <!-- Update Button -->
            <div class="flex gap-3 pt-4">
              <button 
                @click="updateEvaluation" 
                :disabled="isUpdating"
                class="flex-1 bg-[#b0884c] text-white px-4 py-2 rounded hover:bg-[#96733f] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
              >
                {{ isUpdating ? 'Updating...' : 'Update Evaluation' }}
              </button>
              <button 
                @click="closeModal" 
                class="px-6 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-50 transition-colors"
              >
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>