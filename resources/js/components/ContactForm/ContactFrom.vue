<script setup lang="ts">
import { ref } from 'vue'

const formData = ref({
  firstname: '',
  lastname: '',
  phone: '',
  email: '',
  message: ''
})

const isSubmitting = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const submitForm = async () => {
  isSubmitting.value = true
  successMessage.value = ''
  errorMessage.value = ''

  // Simple client-side validation
  if (!formData.value.firstname || !formData.value.lastname || !formData.value.phone || !formData.value.email || !formData.value.message) {
    errorMessage.value = 'Veuillez remplir tous les champs obligatoires.'
    isSubmitting.value = false

    return
  }

  // Email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

  if (!emailRegex.test(formData.value.email)) {
    errorMessage.value = 'Veuillez entrer une adresse email valide.'
    isSubmitting.value = false

    return
  }

  // Phone validation - remove non-numeric characters and check length
  const phoneNumber = formData.value.phone.replace(/\D/g, '')

  if (phoneNumber.length < 10 || phoneNumber.length > 15) {
    errorMessage.value = 'Veuillez entrer un numéro de téléphone valide (10-15 chiffres).'
    isSubmitting.value = false

    return
  }

  try {
    const cleanPhone = formData.value.phone.replace(/\D/g, '')
    
    const response = await fetch('/api/enquiries', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
      },
      credentials: 'same-origin',
      body: JSON.stringify({
        firstname: formData.value.firstname,
        lastname: formData.value.lastname,
        phone: cleanPhone,
        email: formData.value.email,
        message: formData.value.message,
        type: 'enquiry'
      })
    })

    const data = await response.json()

    if (response.ok && data.success) {
      successMessage.value = 'Message envoyé avec succès! Je vous réponds dans les 24h.'
      formData.value = {
        firstname: '',
        lastname: '',
        phone: '',
        email: '',
        message: ''
      }
    } else {
      errorMessage.value = data.message || 'Une erreur est survenue. Veuillez réessayer.'
      
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
</script>
<template>
    <form @submit.prevent="submitForm" class="space-y-5">
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Prénom *</label>
                <input 
                    v-model="formData.firstname"
                    type="text" 
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all text-gray-900"
                    placeholder="Prénom"
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                <input 
                    v-model="formData.lastname"
                    type="text" 
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all text-gray-900"
                    placeholder="Nom"
                >
            </div>
            </div>
                <div class="grid sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                    <input 
                      v-model="formData.phone"
                      type="tel" 
                      required
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all text-gray-900"
                      placeholder="819 123 4567"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Courriel *</label>
                    <input 
                        v-model="formData.email"
                        type="email" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all text-gray-900"
                        placeholder="name@email.com"
                    >
                </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Votre message *</label>
            <textarea 
            v-model="formData.message"
            rows="5" 
            required
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all resize-none text-gray-900"
            placeholder="Je souhaite plus d'informations sur..."
            >
            </textarea>
        </div>

        <button 
            type="submit"
            :disabled="isSubmitting"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
        >
        <svg v-if="isSubmitting" class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
            {{ isSubmitting ? 'Envoi en cours...' : 'ENVOYER →' }}
        </button>

        <!-- Success/Error Messages -->
        <div v-if="successMessage" class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ successMessage }}
        </div>
        <div v-if="errorMessage" class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
            {{ errorMessage }}
        </div>
    </form>
</template>