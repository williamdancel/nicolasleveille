
<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { enquiries } from '@/routes'

// Define interfaces/types
interface Enquiry {
  id: number
  firstname: string
  lastname: string
  phone: string
  email: string
  message: string
  type: 'visitation' | 'enquiry'
  status: 'pending' | 'in-progress' | 'awaiting_customer' | 'closed' | 'cancelled'
  admin_notes: string | null
  replied_at: string | null
  created_at: string
  updated_at: string
  deleted_at: string | null
}

interface Statistics {
  total: number
  pending: number
  in_progress: number
  awaiting_customer: number
  closed: number
  cancelled: number
  visitation: number
  enquiry: number
  deleted?: number
}

interface Pagination {
  current_page: number
  last_page: number
  per_page: number
  total: number
  prev_page_url: string | null
  next_page_url: string | null
  data: Enquiry[]
}

interface ApiResponse {
  success: boolean
  data: Pagination
  statistics: Statistics
  message?: string
}

interface EditForm {
  type: 'visitation' | 'enquiry'
  status: 'pending' | 'in-progress' | 'awaiting_customer' | 'closed' | 'cancelled'
  admin_notes: string
}

defineOptions({
  layout: {
    breadcrumbs: [
      {
        title: 'Enquiries',
        href: typeof enquiries === 'function' ? enquiries() : '/admin/enquiries',
      },
    ],
  },
})

const enquiriesList = ref<Enquiry[]>([])
const statistics = ref<Statistics>({
  total: 0,
  pending: 0,
  in_progress: 0,
  awaiting_customer: 0,
  closed: 0,
  cancelled: 0,
  visitation: 0,
  enquiry: 0
})
const currentStatus = ref<string>('all')
const currentType = ref<string>('all')
const searchTerm = ref<string>('')
const pagination = ref<Pagination | any>({})
const selectedEnquiry = ref<Enquiry | null>(null)
const selectedIds = ref<number[]>([])
const selectAll = ref<boolean>(false)
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

const loadEnquiries = async (): Promise<void> => {
  try {
    const params = new URLSearchParams({
      status: currentStatus.value,
      type: currentType.value,
      search: searchTerm.value,
      page: String(pagination.value.current_page || 1)
    })
    
    const response = await fetchAPI<ApiResponse>(`/api/admin/enquiries?${params}`)
    enquiriesList.value = response.data.data
    statistics.value = response.statistics
    pagination.value = response.data
    selectedIds.value = []
    selectAll.value = false
  } catch (error) {
    console.error('Failed to load enquiries:', error)
    alert('Failed to load enquiries: ' + (error as Error).message)
  }
}

const debouncedSearch = (): void => {
  if (searchTimeout) {
    clearTimeout(searchTimeout)
  }

  searchTimeout = setTimeout(() => {
    loadEnquiries()
  }, 500)
}

const deleteEnquiry = async (id: number): Promise<void> => {
  if (!confirm('Are you sure you want to delete this enquiry?')) {
return
}
  
  try {
    await fetchAPI(`/api/admin/enquiries/${id}`, {
      method: 'DELETE'
    })
    await loadEnquiries()

    if (selectedEnquiry.value?.id === id) {
      selectedEnquiry.value = null
    }
  } catch (error) {
    console.error('Failed to delete enquiry:', error)
    alert('Failed to delete enquiry: ' + (error as Error).message)
  }
}

const prevPage = (): void => {
  if (pagination.value.prev_page_url) {
    pagination.value.current_page--
    loadEnquiries()
  }
}

const nextPage = (): void => {
  if (pagination.value.next_page_url) {
    pagination.value.current_page++
    loadEnquiries()
  }
}

const getStatusClass = (status: string): string => {
  const classes: Record<string, string> = {
    pending: 'bg-yellow-100 text-yellow-800',
    'in-progress': 'bg-blue-100 text-blue-800',
    awaiting_customer: 'bg-purple-100 text-purple-800',
    closed: 'bg-green-100 text-green-800',
    cancelled: 'bg-red-100 text-red-800'
  }

  return classes[status] || 'bg-gray-100 text-gray-800'
}

const getTypeClass = (type: string): string => {
  const classes: Record<string, string> = {
    visitation: 'bg-indigo-100 text-indigo-800',
    enquiry: 'bg-emerald-100 text-emerald-800'
  }

  return classes[type] || 'bg-gray-100 text-gray-800'
}

const formatStatus = (status: string): string => {
  const statusMap: Record<string, string> = {
    pending: 'Pending',
    'in-progress': 'In Progress',
    awaiting_customer: 'Awaiting Customer',
    closed: 'Closed',
    cancelled: 'Cancelled'
  }

  return statusMap[status] || status
}

const formatDate = (date: string): string => {
  return new Date(date).toLocaleDateString()
}

const editForm = ref<EditForm>({
  type: 'enquiry',
  status: 'pending',
  admin_notes: ''
})
const isUpdating = ref<boolean>(false)

const viewEnquiry = async (enquiry: Enquiry): Promise<void> => {
  selectedEnquiry.value = enquiry
  // Populate edit form
  editForm.value = {
    type: enquiry.type,
    status: enquiry.status,
    admin_notes: enquiry.admin_notes || ''
  }
}

const updateEnquiry = async (): Promise<void> => {
  if (!selectedEnquiry.value) {
return
}
  
  isUpdating.value = true
  
  try {
    await fetchAPI(`/api/admin/enquiries/${selectedEnquiry.value.id}`, {
      method: 'PUT',
      body: JSON.stringify({
        type: editForm.value.type,
        status: editForm.value.status,
        admin_notes: editForm.value.admin_notes
      })
    })
    
    // Update local data
    if (selectedEnquiry.value) {
      selectedEnquiry.value.type = editForm.value.type
      selectedEnquiry.value.status = editForm.value.status
      selectedEnquiry.value.admin_notes = editForm.value.admin_notes
    }
    
    await loadEnquiries()
    alert('Enquiry updated successfully')
    closeModal()
  } catch (error) {
    console.error('Failed to update enquiry:', error)
    alert('Failed to update enquiry: ' + (error as Error).message)
  } finally {
    isUpdating.value = false
  }
}

const closeModal = (): void => {
  selectedEnquiry.value = null
  editForm.value = {
    type: 'enquiry',
    status: 'pending',
    admin_notes: ''
  }
}

onMounted(() => {
  loadEnquiries()
})
</script>
<template>
  <div class="enquiry-manager">

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow mb-6 p-4">
      <div class="flex justify-between items-center flex-wrap gap-4">
        <div class="flex gap-4 flex-wrap">
          <!-- Status Filters -->
          <div class="flex items-center gap-2">
            <span class="text-sm font-medium text-gray-700">Status:</span>
            <select v-model="currentStatus" @change="loadEnquiries" class="border rounded-lg px-3 py-1">
              <option value="all">All</option>
              <option value="pending">Pending</option>
              <option value="in-progress">In Progress</option>
              <option value="awaiting_customer">Awaiting Customer</option>
              <option value="closed">Closed</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
          
          <!-- Type Filters -->
          <div class="flex items-center gap-2">
            <span class="text-sm font-medium text-gray-700">Type:</span>
            <select v-model="currentType" @change="loadEnquiries" class="border rounded-lg px-3 py-1">
              <option value="all">All</option>
              <option value="visitation">Visitation</option>
              <option value="enquiry">Enquiry</option>
            </select>
          </div>
        </div>
        
        <div class="flex gap-2">
          <input 
            v-model="searchTerm" 
            type="text" 
            placeholder="Search..." 
            class="border rounded-lg px-4 py-2"
            @input="debouncedSearch"
          >
          <button @click="loadEnquiries" class="bg-[#b0884c] text-white px-4 py-2 rounded-lg hover:bg-[#96733f]">
            Refresh
          </button>
        </div>
      </div>
    </div>

    <!-- Enquiries Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="enquiry in enquiriesList" :key="enquiry.id" class="hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="text-sm font-medium text-gray-900">{{ enquiry.firstname }} {{ enquiry.lastname }}</div>
                <div class="text-sm text-gray-500">{{ enquiry.email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ enquiry.phone }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getTypeClass(enquiry.type)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                  {{ enquiry.type }}
                </span>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">{{ enquiry.message }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="getStatusClass(enquiry.status)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                  {{ formatStatus(enquiry.status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(enquiry.created_at) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button @click="viewEnquiry(enquiry)" class="text-indigo-600 hover:text-indigo-900 mr-3">View</button>
                <button @click="deleteEnquiry(enquiry.id)" class="text-red-600 hover:text-red-900">Delete</button>
              </td>
            </tr>
            <tr v-if="enquiries.length === 0">
              <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                No enquiries found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
        <div class="flex justify-between items-center">
          <div class="text-sm text-gray-700">
            Showing {{ enquiries.length }} of {{ pagination.total }} results
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
    <div v-if="selectedEnquiry" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Enquiry Details</h2>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">✕</button>
        </div>
        
        <div class="space-y-4">
            <!-- Customer Information (Read Only) -->
            <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <p class="mt-1 text-gray-900">{{ selectedEnquiry.firstname }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <p class="mt-1 text-gray-900">{{ selectedEnquiry.lastname }}</p>
            </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 text-gray-900">{{ selectedEnquiry.email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <p class="mt-1 text-gray-900">{{ selectedEnquiry.phone }}</p>
            </div>
            </div>
            
            <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <div class="mt-1 p-3 bg-gray-50 rounded-lg">
                <p class="whitespace-pre-wrap text-gray-900">{{ selectedEnquiry.message }}</p>
            </div>
            </div>
            
            <!-- Editable Fields -->
            <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Type</label>
                <select v-model="editForm.type" class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]">
                <option value="visitation">Visitation</option>
                <option value="enquiry">Enquiry</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select v-model="editForm.status" class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]">
                <option value="pending">Pending</option>
                <option value="in-progress">In Progress</option>
                <option value="awaiting_customer">Awaiting Customer</option>
                <option value="closed">Closed</option>
                <option value="cancelled">Cancelled</option>
                </select>
            </div>
            </div>
            
            <!-- Admin Notes -->
            <div>
            <label class="block text-sm font-medium text-gray-700">Admin Notes</label>
            <textarea 
                v-model="editForm.admin_notes" 
                rows="4" 
                class="mt-1 block w-full border rounded-md shadow-sm p-2 focus:ring-[#b0884c] focus:border-[#b0884c]"
                placeholder="Add notes about this enquiry..."
            ></textarea>
            </div>
            
            <!-- Update Button -->
            <div class="flex gap-3 pt-4">
            <button 
                @click="updateEnquiry" 
                :disabled="isUpdating"
                class="flex-1 bg-[#b0884c] text-white px-4 py-2 rounded hover:bg-[#96733f] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
                {{ isUpdating ? 'Updating...' : 'Update Enquiry' }}
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
