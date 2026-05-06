<template>
  <section class="py-24 bg-gray-900 text-white relative overflow-hidden" id="contact">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl"></div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
      
      <div class="grid lg:grid-cols-2 gap-16 items-start">
        
        <!-- Left Side - Text Content -->
        <div class="space-y-8">
          <div>
            <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4">
              Tu peux compter sur moi pour élever le niveau.
            </p>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-serif leading-tight">
              Une présence forte. Une stratégie claire. Une transaction mieux menée.
            </h2>
          </div>

          <!-- Key promises -->
          <div class="space-y-4 pt-4">
            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une présence forte.</p>
              <p class="text-gray-400 text-sm">Disponible et réactive à chaque étape</p>
            </div>

            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une stratégie claire.</p>
              <p class="text-gray-400 text-sm">Chaque action a un objectif précis</p>
            </div>

            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une transaction mieux menée.</p>
              <p class="text-gray-400 text-sm">Jusqu'à la signature finale</p>
            </div>
          </div>
        </div>

        <!-- Right Side - Contact Form -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">PARLER À NICOLAS</h3>
          <p class="text-gray-500 text-sm mb-6">Réponse sous 24h, garantie.</p>

          <ContactForm/>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue'
import ContactForm  from '@/components/ContactForm/ContactFrom.vue'

// Define interfaces
interface FormData {
  firstname: string
  lastname: string
  phone: string
  email: string
  message: string
}

interface ApiResponse {
  success?: boolean
  message?: string
  errors?: Record<string, string[]>
}


// Reactive state
const formData = reactive<FormData>({
  firstname: '',
  lastname: '',
  phone: '',
  email: '',
  message: ''
})

const isSubmitting = ref<boolean>(false)
const successMessage = ref<string>('')
const errorMessage = ref<string>('')

// Helper function to clean phone number
const cleanPhoneNumber = (phone: string): string => {
  return phone.replace(/\D/g, '')
}

// Validation functions
const validateForm = (): boolean => {
  // Check required fields
  if (!formData.firstname || !formData.lastname || !formData.phone || !formData.email || !formData.message) {
    errorMessage.value = 'Veuillez remplir tous les champs obligatoires.'

    return false
  }

  // Email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

  if (!emailRegex.test(formData.email)) {
    errorMessage.value = 'Veuillez entrer une adresse email valide.'

    return false
  }

  // Phone validation - remove non-numeric characters and check length
  const phoneNumber = cleanPhoneNumber(formData.phone)

  if (phoneNumber.length < 10 || phoneNumber.length > 15) {
    errorMessage.value = 'Veuillez entrer un numéro de téléphone valide (10-15 chiffres).'

    return false
  }

  return true
}

// API call function
const sendToApi = async (): Promise<void> => {
  try {
    // Clean phone number (remove non-numeric characters)
    const cleanPhone = cleanPhoneNumber(formData.phone)
    
    // Get CSRF token
    const csrfToken = document.querySelector<HTMLMetaElement>('meta[name="csrf-token"]')?.getAttribute('content') || ''
    
    const response = await fetch('/api/enquiries', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken
      },
      credentials: 'same-origin',
      body: JSON.stringify({
        firstname: formData.firstname,
        lastname: formData.lastname,
        phone: cleanPhone,
        email: formData.email,
        message: formData.message,
        type: 'enquiry'
      })
    })

    const data: ApiResponse = await response.json()

    if (response.ok && data.success) {
      successMessage.value = 'Message envoyé avec succès! Je vous réponds dans les 24h.'
      // Reset form
      formData.firstname = ''
      formData.lastname = ''
      formData.phone = ''
      formData.email = ''
      formData.message = ''
    } else {
      errorMessage.value = data.message || 'Une erreur est survenue. Veuillez réessayer.'
      
      // Handle validation errors
      if (data.errors) {
        const errors = Object.values(data.errors).flat()
        errorMessage.value = errors.join(', ')
      }
    }
  } catch (error) {
    console.error('Fetch error:', error)
    errorMessage.value = 'Erreur de connexion. Veuillez vérifier votre connexion internet.'
  } finally {
    isSubmitting.value = false
  }
}

// Main submit function
const submitForm = async (): Promise<void> => {
  isSubmitting.value = true
  successMessage.value = ''
  errorMessage.value = ''

  // Validate form before submission
  if (!validateForm()) {
    isSubmitting.value = false

    return
  }

  await sendToApi()
}
</script>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.animate-spin {
  animation: spin 1s linear infinite;
}
</style>