<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { reactive, ref } from 'vue'

const formData = reactive({
  fullname: '',
  phone: '',
  email: '',
  address: '',
  propertyInfo: '',
})

const isSubmitting = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const submitForm = async () => {
  successMessage.value = ''
  errorMessage.value = ''

  if (
    !formData.fullname ||
    !formData.phone ||
    !formData.email ||
    !formData.address ||
    !formData.propertyInfo 
  ) {
    errorMessage.value = 'Veuillez remplir les champs obligatoires.'

    return
  }

  try {
    isSubmitting.value = true

    const response = await fetch('/api/evaluation', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN':
          document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content') || '',
      },
      credentials: 'same-origin',
      body: JSON.stringify({
        fullname: formData.fullname,
        phone: formData.phone,
        email: formData.email,
        address: formData.address,
        message: formData.propertyInfo,
        type: 'evaluation',
      }),
    })

    const data = await response.json()

    if (response.ok && data.success) {
      successMessage.value = 'Votre demande a été envoyée avec succès.'

      formData.fullname = ''
      formData.phone = ''
      formData.email = ''
      formData.address = ''
      formData.propertyInfo = ''
    } else {
      errorMessage.value =
        data.message || 'Une erreur est survenue.'
    }
  } catch (error) {
    console.error('Submission error:', error)
    errorMessage.value = 'Erreur de connexion.'
  } finally {
    isSubmitting.value = false
  }
}
</script>

<template>
  <Head title="Services" />

  <div class="min-h-screen bg-[#f4f4f4]">
    <!-- Hero Section -->
    <section
      class="bg-gray-900 text-white py-32 text-center relative overflow-hidden"
    >
      <div class="absolute inset-0 opacity-10">
        <div
          class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"
        ></div>

        <div
          class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"
        ></div>
      </div>

      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h1
          class="text-4xl md:text-5xl lg:text-6xl font-serif max-w-4xl mx-auto animate-slide-up"
        >
          Évaluation gratuite
        </h1>

        <div
          class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"
        ></div>
      </div>
    </section>

    <!-- FORM SECTION -->
    <section class="py-20">
      <div class="max-w-xl mx-auto px-6">
        <form
          @submit.prevent="submitForm"
          class="space-y-8"
        >
          <!-- FULL NAME -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
            <input
              v-model="formData.fullname"
              type="text"
              placeholder="Nom complet"
              class="w-full h-16 border border-gray-300 bg-transparent px-10 text-lg font-light outline-none focus:border-[#ac8c4c] transition" maxlength="100"
            />
          </div>

          <!-- PHONE -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
            <input
              v-model="formData.phone"
              type="text"
              placeholder="8191234567"
              class="w-full h-16 border border-gray-300 bg-transparent px-10 text-lg font-light outline-none focus:border-[#ac8c4c] transition" maxlength="15"
            />
          </div>

          <!-- EMAIL -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Courriel *</label>
            <input
              v-model="formData.email"
              type="email"
              placeholder="Courriel *"
              class="w-full h-16 border border-gray-300 bg-transparent px-10 text-lg font-light outline-none focus:border-[#ac8c4c] transition"
            />
          </div>

          <!-- ADDRESS -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Adresse *</label>
            <input
              v-model="formData.address"
              type="text"
              placeholder="Adresse *"
              class="w-full h-16 border border-gray-300 bg-transparent px-10 text-lg font-light outline-none focus:border-[#ac8c4c] transition" maxlength="100"
            />
          </div>

          <!-- PROPERTY INFO -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Informations sur votre propriété*</label>
            <textarea
              v-model="formData.propertyInfo"
              rows="10"
              placeholder="Informations sur votre propriété"
              class="w-full border border-gray-300 bg-transparent px-10 py-8 text-lg font-light outline-none resize-none focus:border-[#ac8c4c] transition"
            ></textarea>
          </div>

          <!-- REQUIRED -->
          <p class="text-red-500 text-lg">
            * Champs obligatoires
          </p>

          <!-- BUTTON -->
          <div class="pt-4">
            <button
              type="submit"
              :disabled="isSubmitting"
              class="bg-red-600  hover:opacity-90 text-white text-3xl font-light px-14 py-4 transition disabled:opacity-50"
            >
              {{ isSubmitting ? 'Envoi...' : 'Envoyer' }}
            </button>
          </div>

          <!-- SUCCESS -->
          <div
            v-if="successMessage"
            class="border border-green-500 text-green-600 px-6 py-4 text-lg"
          >
            {{ successMessage }}
          </div>

          <!-- ERROR -->
          <div
            v-if="errorMessage"
            class="border border-red-500 text-red-600 px-6 py-4 text-lg"
          >
            {{ errorMessage }}
          </div>
        </form>
      </div>
    </section>
  </div>
</template>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

/* Hero Section Animations Only */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scale {
  from {
    opacity: 0;
    transform: scaleX(0);
  }
  to {
    opacity: 1;
    transform: scaleX(1);
  }
}

@keyframes pulse {
  0%,
  100% {
    opacity: 0.05;
  }

  50% {
    opacity: 0.15;
  }
}

/* Animation Classes */
.animate-fade-in {
  animation: fadeIn 0.8s ease-out forwards;
}

.animate-slide-up {
  animation: slideUp 0.8s ease-out forwards;
}

.animate-scale {
  animation: scale 0.6s ease-out 0.3s forwards;
  transform-origin: center;
}

.animate-pulse-slow {
  animation: pulse 4s ease-in-out infinite;
}

/* Delay Utilities */
.animation-delay-1000 {
  animation-delay: 1s;
}
</style>