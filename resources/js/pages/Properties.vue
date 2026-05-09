<template>
  <Head title="Propriétés"/>
  <div class="min-h-screen bg-white">
    <!-- Hero Section with Transitions -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
          Découvrez nos annonces
        </p>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif animate-slide-up">
          Maisons à vendre à Gatineau
        </h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
        <p class="text-gray-300 mt-6 max-w-2xl mx-auto animate-fade-in-up">
          Sélection actuelle et présentation soignée des propriétés que je mets en marché.
        </p>
      </div>
    </section>

    <!-- Properties Section -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
          <div>
            <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mt-2">
              Propriétés à vendre
            </h2>
            <p class="text-gray-500 mt-2 max-w-2xl">
              Un portefeuille choisi. Des biens d'exception et des coups de cœur du moment.
            </p>
          </div>
          <div class="flex gap-3 mt-4 md:mt-0">
            <button 
              @click="filter = 'all'" 
              :class="filter === 'all' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
              class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200"
            >
              Tous
            </button>
            <button 
              @click="filter = 'maison'" 
              :class="filter === 'maison' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
              class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200"
            >
              Maisons
            </button>
            <button 
              @click="filter = 'condo'" 
              :class="filter === 'condo' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
              class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200"
            >
              Condos
            </button>
            <button 
              @click="filter = 'terrain'" 
              :class="filter === 'terrain' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
              class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200"
            >
              Terrains
            </button>
          </div>
        </div>

        <!-- Listings Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          <!-- Property Card 1 - Maison unifamiliale moderne -->
          <div 
            v-show="filter === 'all' || filter === 'maison'"
            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
          >
            <div class="relative h-64 overflow-hidden bg-gray-200">
              <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                À vendre
              </div>
              <img 
                src="/images/36-rue-de-la-mine-gatineau.jpg" 
                alt="Maison unifamiliale moderne"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
            </div>
            <div class="p-6">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-xl font-bold text-gray-900">Maison unifamiliale moderne</h3>
                  <p class="text-gray-500 text-sm mt-1">Gatineau (Plateau), QC</p>
                </div>
                <span class="text-red-600 font-bold text-lg price">549 000 $</span>
              </div>
              <div class="flex gap-4 mt-4 text-sm text-gray-500 border-t border-gray-100 pt-4">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 3 chambres
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> 2 sdb
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 1 650 pi²
                </span>
              </div>
              <button 
                @click="openInquiryModal(properties[0])"
                class="mt-5 w-full py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-red-500 hover:border-red-500 hover:text-white transition-all duration-200"
              >
                Demander une visite
              </button>
            </div>
          </div>

          <!-- Property Card 2 - Propriété avec terrain exceptionnel -->
          <div 
            v-show="filter === 'all' || filter === 'terrain'"
            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
          >
            <div class="relative h-64 overflow-hidden bg-gray-200">
              <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                Coup de cœur
              </div>
              <img 
                src="/images/358-ch-daylmer-app-3-gatineau-mls.jpg" 
                alt="Propriété avec terrain exceptionnel"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
            </div>
            <div class="p-6">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-xl font-bold text-gray-900">Propriété avec terrain exceptionnel</h3>
                  <p class="text-gray-500 text-sm mt-1">Chelsea, QC</p>
                </div>
                <span class="text-red-600 font-bold text-lg price">895 000 $</span>
              </div>
              <div class="flex gap-4 mt-4 text-sm text-gray-500 border-t border-gray-100 pt-4">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 4 chambres
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> 2 sdb
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 2.5 acres
                </span>
              </div>
              <button 
                @click="openInquiryModal(properties[1])"
                class="mt-5 w-full py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-red-500 hover:border-red-500 hover:text-white transition-all duration-200"
              >
                Demander une visite
              </button>
            </div>
          </div>

          <!-- Property Card 3 - Condo lumineux -->
          <div 
            v-show="filter === 'all' || filter === 'condo'"
            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
          >
            <div class="relative h-64 overflow-hidden bg-gray-200">
              <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                Idéal premier acheteur
              </div>
              <img 
                src="/images/condo-lumineux-hull.jpg" 
                alt="Condominium lumineux"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
            </div>
            <div class="p-6">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-xl font-bold text-gray-900">Condominium lumineux</h3>
                  <p class="text-gray-500 text-sm mt-1">Hull (Vieux-Hull), QC</p>
                </div>
                <span class="text-red-600 font-bold text-lg price">329 000 $</span>
              </div>
              <div class="flex gap-4 mt-4 text-sm text-gray-500 border-t border-gray-100 pt-4">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 2 chambres
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> 1 sdb
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 985 pi² + balcon
                </span>
              </div>
              <button 
                @click="openInquiryModal(properties[2])"
                class="mt-5 w-full py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-red-500 hover:border-red-500 hover:text-white transition-all duration-200"
              >
                Demander une visite
              </button>
            </div>
          </div>
        </div>

        <!-- No Results Message -->
        <div v-if="filteredCount === 0" class="text-center py-12">
          <p class="text-gray-500">Aucune propriété dans cette catégorie pour le moment.</p>
        </div>

       <CTASection/>
      </div>
    </section>

    <!-- Modal -->
    <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" @click.self="closeModal">
      <div class="bg-white rounded-2xl max-w-md w-full p-6 relative animate-modal-in">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-bold text-gray-900">Demander une visite</h3>
          <button @click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        
        <div class="mb-4 p-3 bg-gray-50 rounded-lg">
          <p class="text-sm text-gray-500">Propriété sélectionnée</p>
          <p class="font-semibold text-gray-900">{{ selectedProperty?.title }}</p>
          <p class="text-sm text-gray-500">{{ selectedProperty?.location }} - {{ selectedProperty?.price }}</p>
        </div>
        
        <form @submit.prevent="submitInquiry" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
            <input 
              type="text" 
              v-model="inquiryForm.name" 
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all"
              placeholder="Name"
            >
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
            <input 
              type="email" 
              v-model="inquiryForm.email" 
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all"
              placeholder="jean.dupont@email.com"
            >
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
            <input 
              type="tel" 
              v-model="inquiryForm.phone" 
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all"
              placeholder="(819) 123-4567"
            >
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message (optionnel)</label>
            <textarea 
              v-model="inquiryForm.message" 
              rows="3"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all resize-none"
              placeholder="J'aimerais plus d'informations sur cette propriété..."
            ></textarea>
          </div>
          
          <button 
            type="submit" 
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition-colors duration-200"
          >
            Envoyer la demande
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import CTASection from '@/components/CTA/CTASection.vue'

// Define interfaces
interface Property {
  id: number
  title: string
  location: string
  price: string
}

interface InquiryFormData {
  name: string
  email: string
  phone: string
  message: string
}

// Type for filter values
type FilterValue = 'all' | 'maison' | 'terrain' | 'condo'

// Filter state
const filter = ref<FilterValue>('all')

// Modal state
const showModal = ref<boolean>(false)
const selectedProperty = ref<Property | null>(null)
const inquiryForm = ref<InquiryFormData>({
  name: '',
  email: '',
  phone: '',
  message: ''
})

// Properties data
const properties: Property[] = [
  {
    id: 1,
    title: 'Maison unifamiliale moderne',
    location: 'Gatineau (Plateau), QC',
    price: '549 000 $'
  },
  {
    id: 2,
    title: 'Propriété avec terrain exceptionnel',
    location: 'Chelsea, QC',
    price: '895 000 $'
  },
  {
    id: 3,
    title: 'Condominium lumineux',
    location: 'Hull (Vieux-Hull), QC',
    price: '329 000 $'
  }
]

// Filtered count
const filteredCount = computed<number>(() => {
  if (filter.value === 'all') {
    return 3
  }

  if (filter.value === 'maison') {
    return 1
  }

  if (filter.value === 'terrain') {
    return 1
  }

  if (filter.value === 'condo') {
    return 1
  }

  return 0
})

// Image error handling
const handleImageError = (event: Event) => {
  const imgElement = event.target as HTMLImageElement
  imgElement.src = 'https://placehold.co/600x400/f3f4f6/9ca3af?text=Photo+à+venir'
}

// Modal methods
const openInquiryModal = (property: Property) => {
  selectedProperty.value = property
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  selectedProperty.value = null
  inquiryForm.value = {
    name: '',
    email: '',
    phone: '',
    message: ''
  }
}

const submitInquiry = () => {
  // Validate form
  if (!inquiryForm.value.name || !inquiryForm.value.email || !inquiryForm.value.phone) {
    alert('Veuillez remplir tous les champs obligatoires.')

    return
  }

  // Here you would send the data to your API
  console.log('Inquiry submitted:', {
    property: selectedProperty.value,
    ...inquiryForm.value
  })
  
  alert('Votre demande a été envoyée! Nous vous contacterons sous 24h.')
  closeModal()
}
</script>

<style scoped>

/* Delay Utilities */
.animation-delay-1000 {
  animation-delay: 1s;
}
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

@keyframes modalIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.animate-modal-in {
  animation: modalIn 0.2s ease-out;
}

.price{
  width:125px;
}
</style>