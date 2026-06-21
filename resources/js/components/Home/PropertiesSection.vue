<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref, reactive, computed, onMounted, onUnmounted } from 'vue'

// Define interfaces
interface PropertyImage {
  url: string
  caption: string
}

interface PropertyFeature {
  label: string
  value: string
  icon?: string
}

interface Property {
  id: number
  title: string
  location: string
  price: string
  badge?: string
  type: 'maison' | 'terrain' | 'condo'
  mainImage: string
  features: PropertyFeature[]
  images: PropertyImage[]
  reference?: string
  description?: string
}

interface InquiryFormData {
  name: string
  email: string
  phone: string
  message: string
}

// Properties data array
const properties = ref<Property[]>([
  {
    id: 1,
    title: '364 Rue Jules-Bordet',
    location: 'Gatineau',
    price: '400 000 $',
    badge: 'À vendre',
    type: 'maison',
    mainImage: '/images/364-Rue-Jules-Bordet-Gatineau/Front.png',
    reference: '',
    description: 'Superbe maison en rangée, unité de coin entièrement rénovée, située dans le secteur Hôpital--Val-Boisée, à proximité des services, transports, écoles et parcs. Elle offre trois chambres lumineuses, un grand salon convivial, une cuisine moderne et fonctionnelle ainsi que des salles de bain rénovées avec goût. Le sous-sol aménagé aux plafonds hauts propose un espace polyvalent pouvant servir de salle familiale, de bureau ou de salle de jeux. Profitez également d\'une grande terrasse rénovée, idéale pour recevoir et savourer la belle saison. Une propriété clé en main parfaite pour premiers acheteurs ou jeunes familles!',
    features: [
      { label: 'chambres', value: '3 chambres' },
      { label: 'salles de bain', value: '2 sdb' },
      { label: 'superficie', value: '1 204 pi²' }
    ],
    images: [
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Front.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Front-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Back.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Back-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Entrance.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Bedroom.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Bedroom-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Bedroom-3.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Closet.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Bathroom.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Bathroom-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Living-room.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Living-to-dining.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Dining-room.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Kitchen.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/Kitchen-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/photo-dom-1.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/photo-dom-2.png', caption: '' },
      { url: '/images/364-Rue-Jules-Bordet-Gatineau/photo-dom-3.png', caption: '' },
    ]
  },
])

// Track expanded descriptions
const expandedDescriptions = ref<Set<number>>(new Set())

// Toggle description expansion
const toggleDescription = (propertyId: number) => {
  if (expandedDescriptions.value.has(propertyId)) {
    expandedDescriptions.value.delete(propertyId)
  } else {
    expandedDescriptions.value.add(propertyId)
  }

  // Trigger reactivity
  expandedDescriptions.value = new Set(expandedDescriptions.value)
}

// Check if description is expanded
const isDescriptionExpanded = (propertyId: number): boolean => {
  return expandedDescriptions.value.has(propertyId)
}

// Modal states
const showModal = ref(false)
const showGallery = ref(false)
const selectedProperty = ref<Property | null>(null)
const currentImageIndex = ref(0)
const currentGalleryImages = ref<PropertyImage[]>([])
const isSubmitting = ref(false)
const submitError = ref<string | null>(null)
const submitSuccess = ref(false)

// CSRF Token - get from meta tag (Laravel default)
const getCsrfToken = (): string => {
  if (typeof document === 'undefined') {
return ''
}

  const token = document.querySelector('meta[name="csrf-token"]')

  return token ? token.getAttribute('content') || '' : ''
}

// Inquiry form
const inquiryForm = reactive<InquiryFormData>({
  name: '',
  email: '',
  phone: '',
  message: ''
})

// Computed properties
const currentImageCaption = computed(() => {
  if (currentGalleryImages.value.length === 0) {
return ''
}

  return currentGalleryImages.value[currentImageIndex.value]?.caption || 'Photo de la propriété'
})

// Helper function to split full name
const splitFullName = (fullName: string): { firstname: string; lastname: string } | null => {
  const trimmed = fullName.trim().replace(/\s+/g, ' ')
  
  if (!trimmed) {
    return null
  }
  
  const parts = trimmed.split(' ')
  
  if (parts.length < 2) {
    return null
  }
  
  const firstname = parts[0]
  const lastname = parts.slice(1).join(' ')
  
  return { firstname, lastname }
}

// Methods
const openInquiryModal = (property: Property) => {
  selectedProperty.value = property
  showModal.value = true
  submitError.value = null
  submitSuccess.value = false

  if (typeof document !== 'undefined') {
    document.body.style.overflow = 'hidden'
  }
}

const closeModal = () => {
  showModal.value = false
  selectedProperty.value = null
  inquiryForm.name = ''
  inquiryForm.email = ''
  inquiryForm.phone = ''
  inquiryForm.message = ''
  submitError.value = null
  submitSuccess.value = false

  if (typeof document !== 'undefined') {
    document.body.style.overflow = ''
  }
}

const openGallery = (property: Property) => {
  selectedProperty.value = property
  currentGalleryImages.value = property.images
  currentImageIndex.value = 0
  showGallery.value = true

  if (typeof document !== 'undefined') {
    document.body.style.overflow = 'hidden'
  }
}

const closeGallery = () => {
  showGallery.value = false
  currentGalleryImages.value = []
  currentImageIndex.value = 0

  if (!showModal.value && typeof document !== 'undefined') {
    document.body.style.overflow = ''
  }
}

const nextImage = () => {
  if (currentGalleryImages.value.length > 1) {
    currentImageIndex.value = (currentImageIndex.value + 1) % currentGalleryImages.value.length
  }
}

const previousImage = () => {
  if (currentGalleryImages.value.length > 1) {
    currentImageIndex.value = (currentImageIndex.value - 1 + currentGalleryImages.value.length) % currentGalleryImages.value.length
  }
}

const submitInquiry = async () => {
  submitError.value = null

  // Validate form
  if (!inquiryForm.name || !inquiryForm.email || !inquiryForm.phone) {
    submitError.value = 'Veuillez remplir tous les champs obligatoires.'

    return
  }

  // Split name
  const nameParts = splitFullName(inquiryForm.name)
  
  if (!nameParts) {
    submitError.value = 'Veuillez entrer votre prénom ET votre nom de famille.'

    return
  }

  const { firstname, lastname } = nameParts
  
  // Validate name lengths
  if (firstname.length < 2 || lastname.length < 2) {
    submitError.value = 'Veuillez entrer un prénom et un nom de famille valides (minimum 2 caractères chacun).'

    return
  }

  // Validate email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

  if (!emailRegex.test(inquiryForm.email)) {
    submitError.value = 'Veuillez entrer une adresse email valide.'

    return
  }

  // Validate phone
  const cleanPhone = inquiryForm.phone.replace(/[\s\(\)\-\.]/g, '')

  if (cleanPhone.length < 10) {
    submitError.value = 'Veuillez entrer un numéro de téléphone valide (minimum 10 chiffres).'

    return
  }

  isSubmitting.value = true

  try {
    // Prepare message with property details
    let finalMessage = ''
    
    if (selectedProperty.value) {
      finalMessage += `Demande de visite pour: ${selectedProperty.value.title}\n`
      finalMessage += `Emplacement: ${selectedProperty.value.location}\n`
      finalMessage += `Prix: ${selectedProperty.value.price}\n`

      if (selectedProperty.value.reference) {
        finalMessage += `Référence: ${selectedProperty.value.reference}\n`
      }

      finalMessage += '\n'
    }

    if (inquiryForm.message.trim()) {
      finalMessage += `Message du client: ${inquiryForm.message}`
    } else {
      finalMessage += 'Aucun message additionnel fourni.'
    }

    // Prepare payload
    const payload = {
      firstname: firstname,
      lastname: lastname,
      phone: inquiryForm.phone,
      email: inquiryForm.email,
      message: finalMessage,
      type: 'visitation'
    }

    // Send using fetch API
    const response = await fetch('/api/enquiries', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': getCsrfToken()
      },
      body: JSON.stringify(payload)
    })

    const data = await response.json()

    if (!response.ok) {
      // Handle validation errors from Laravel
      if (data.errors) {
        const errorMessages = Object.values(data.errors).flat() as string[]

        throw new Error(errorMessages.join('\n'))
      }

      throw new Error(data.message || 'Une erreur est survenue.')
    }

    if (data.success) {
      submitSuccess.value = true
      
      // Auto close after 2 seconds
      setTimeout(() => {
        closeModal()
      }, 2000)
    }
  } catch (error: any) {
    console.error('Error submitting inquiry:', error)
    submitError.value = error.message || 'Une erreur est survenue. Veuillez réessayer plus tard.'
  } finally {
    isSubmitting.value = false
  }
}

// Image error handling
const handleImageError = (event: Event) => {
  const imgElement = event.target as HTMLImageElement
  imgElement.src = 'https://placehold.co/600x400/f3f4f6/9ca3af?text=Photo+à+venir'
}

const handleGalleryImageError = (event: Event) => {
  const imgElement = event.target as HTMLImageElement
  imgElement.src = 'https://placehold.co/1200x800/1f2937/9ca3af?text=Photo+non+disponible'
}

const handleThumbnailError = (event: Event) => {
  const imgElement = event.target as HTMLImageElement
  imgElement.src = 'https://placehold.co/80x60/f3f4f6/9ca3af?text=N/A'
}

// SVG paths for feature icons
const getFeatureIcon = (label: string): string => {
  const iconPaths: Record<string, string> = {
    'chambres': 'M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4',
    'salles de bain': 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
    'superficie': 'M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4'
  }
  
  return iconPaths[label] || iconPaths['chambres']
}

// Keyboard navigation
const handleKeydown = (e: KeyboardEvent) => {
  if (showGallery.value) {
    switch (e.key) {
      case 'ArrowRight':
        nextImage()
        break
      case 'ArrowLeft':
        previousImage()
        break
      case 'Escape':
        closeGallery()
        break
    }
  } else if (showModal.value && e.key === 'Escape') {
    closeModal()
  }
}

onMounted(() => {
  window.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleKeydown)

  if (typeof document !== 'undefined') {
    document.body.style.overflow = ''
  }
})
</script>

<template>
  <section class="py-24 bg-gray-50" id="properties">
    <div class="max-w-7xl mx-auto px-6">
      
      <!-- Header -->
      <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
        <div>
          <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mt-2">
            Propriétés à vendre
          </h2>
          <p class="text-gray-500 mt-2 max-w-2xl">
            Un portefeuille choisi. Des biens d'exception et des coup de cœur du moment.
          </p>
        </div>
        <Link href="/proprietes" class="mt-4 md:mt-0 text-gray-700 border-b border-gray-300 hover:border-red-500 hover:text-red-500 transition-colors font-medium">
          Voir toutes les annonces →
        </Link>
      </div>

      <!-- Listings Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <div 
          v-for="property in properties" 
          :key="property.id"
          class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
        >
          <div 
            class="relative h-64 overflow-hidden bg-gray-200 cursor-pointer"
            @click="openGallery(property)"
          >
            <div 
              v-if="property.badge"
              class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm"
            >
              {{ property.badge }}
            </div>
            <button 
              @click.stop="openGallery(property)"
              class="absolute bottom-4 right-4 z-10 bg-black/50 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center gap-1"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
              </svg>
              Voir photos
            </button>
            <img 
              :src="property.mainImage" 
              :alt="property.title" 
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              @error="handleImageError"
            >
          </div>
          <div class="p-6">
            <div class="flex justify-between items-start">
              <div>
                <h3 class="text-xl font-bold text-gray-900">{{ property.title }}</h3>
                <p class="text-gray-500 text-sm mt-1">{{ property.location }}</p>
              </div>
              <span class="text-red-600 font-bold text-lg price">{{ property.price }}</span>
            </div>
            
            <!-- Description with Show More/Less -->
            <div class="mt-3">
              <p 
                class="text-gray-600 text-sm"
                :class="isDescriptionExpanded(property.id) ? '' : 'line-clamp-2'"
              >
                {{ property.description }}
              </p>
              <button 
                v-if="property.description && property.description.length > 100"
                @click.stop="toggleDescription(property.id)"
                class="text-red-600 hover:text-red-700 text-sm font-medium mt-1 transition-colors"
              >
                {{ isDescriptionExpanded(property.id) ? 'Voir moins' : 'Voir plus' }}
              </button>
            </div>

            <div class="flex gap-4 mt-4 text-sm text-gray-500 border-t border-gray-100 pt-4">
              <span 
                v-for="feature in property.features" 
                :key="feature.label"
                class="flex items-center gap-1"
              >
                <svg 
                  class="w-4 h-4" 
                  fill="none" 
                  stroke="currentColor" 
                  viewBox="0 0 24 24"
                >
                  <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="1.5" 
                    :d="getFeatureIcon(feature.label)"
                  />
                </svg>
                {{ feature.value }}
              </span>
            </div>
            <button 
              @click="openInquiryModal(property)"
              class="mt-5 w-full py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-red-500 hover:border-red-500 hover:text-white transition-all duration-200"
            >
              Demander une visite
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Image Gallery Modal -->
    <Teleport to="body">
      <div 
        v-if="showGallery" 
        class="fixed inset-0 bg-black/90 flex items-center justify-center z-[9999]"
        @click.self="closeGallery"
      >
        <div class="relative w-full max-w-5xl mx-4">
          <button 
            @click="closeGallery"
            class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors z-10"
          >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>

          <div class="relative aspect-[16/10] bg-gray-900 rounded-lg overflow-hidden">
            <img 
              :src="currentGalleryImages[currentImageIndex]?.url" 
              :alt="selectedProperty?.title"
              class="w-full h-full object-contain"
              @error="handleGalleryImageError"
            >
            
            <button 
              v-if="currentGalleryImages.length > 1"
              @click="previousImage"
              class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full p-2 transition-all"
            >
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>
            </button>
            
            <button 
              v-if="currentGalleryImages.length > 1"
              @click="nextImage"
              class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full p-2 transition-all"
            >
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>

            <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white text-sm px-3 py-1 rounded-full">
              {{ currentImageIndex + 1 }} / {{ currentGalleryImages.length }}
            </div>
          </div>

          <div class="mt-4 text-white">
            <h3 class="text-xl font-bold">{{ selectedProperty?.title }}</h3>
            <p class="text-gray-300">{{ selectedProperty?.location }} - {{ selectedProperty?.price }}</p>
            <p class="text-gray-400 mt-1 text-sm">{{ currentImageCaption }}</p>
          </div>

          <div class="mt-4 flex gap-2 overflow-x-auto pb-2">
            <button
              v-for="(image, index) in currentGalleryImages"
              :key="index"
              @click="currentImageIndex = index"
              class="flex-shrink-0 w-20 h-16 rounded-lg overflow-hidden border-2 transition-all"
              :class="index === currentImageIndex ? 'border-white' : 'border-transparent opacity-60 hover:opacity-100'"
            >
              <img 
                :src="image.url" 
                :alt="image.caption"
                class="w-full h-full object-cover"
                @error="handleThumbnailError"
              >
            </button>
          </div>
        </div>
      </div>
    </Teleport>

    <!-- Inquiry Modal -->
    <Teleport to="body">
      <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-[9998] p-4" @click.self="closeModal">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 relative animate-modal-in">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Demander une visite</h3>
            <button @click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          
          <!-- Success Message -->
          <div v-if="submitSuccess" class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <p class="text-green-700 font-medium">Demande envoyée avec succès!</p>
            </div>
            <p class="text-green-600 text-sm mt-1">Nous vous contacterons dans les 24 heures.</p>
          </div>

          <!-- Error Message -->
          <div 
            v-if="submitError" 
            class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg"
            :class="{ 'animate-shake': submitError }"
          >
            <div class="flex items-start gap-3">
              <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <p class="text-red-700 text-sm whitespace-pre-line">{{ submitError }}</p>
            </div>
          </div>
          
          <!-- Property Info -->
          <div class="mb-4 p-3 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-500">Propriété sélectionnée</p>
            <p class="font-semibold text-gray-900">{{ selectedProperty?.title }}</p>
            <p class="text-sm text-gray-500">{{ selectedProperty?.location }} - {{ selectedProperty?.price }}</p>
          </div>
          
          <form @submit.prevent="submitInquiry" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
              <input 
                type="text" 
                v-model="inquiryForm.name" 
                required
                :disabled="isSubmitting"
                :class="[
                  'w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all disabled:bg-gray-100 disabled:cursor-not-allowed',
                  submitError && submitError.includes('prénom') ? 'border-red-300 bg-red-50' : 'border-gray-300'
                ]"
                placeholder="Nom"
                @input="submitError = null"
              >
              <p class="text-xs text-gray-400 mt-1">Prénom et nom de famille requis</p>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
              <input 
                type="email" 
                v-model="inquiryForm.email" 
                required
                :disabled="isSubmitting"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                placeholder="email"
              >
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
              <input 
                type="tel" 
                v-model="inquiryForm.phone" 
                required
                :disabled="isSubmitting"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all disabled:bg-gray-100 disabled:cursor-not-allowed"
                placeholder="(819) 123-4567"
              >
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Message (optionnel)</label>
              <textarea 
                v-model="inquiryForm.message" 
                rows="3"
                :disabled="isSubmitting"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all resize-none disabled:bg-gray-100 disabled:cursor-not-allowed"
                placeholder="J'aimerais plus d'informations sur cette propriété..."
              ></textarea>
            </div>
            
            <button 
              type="submit" 
              :disabled="isSubmitting"
              class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition-colors duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed flex items-center justify-center gap-2"
            >
              <svg 
                v-if="isSubmitting" 
                class="animate-spin w-5 h-5" 
                fill="none" 
                viewBox="0 0 24 24"
              >
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
              </svg>
              {{ isSubmitting ? 'Envoi en cours...' : 'Envoyer la demande' }}
            </button>
          </form>
        </div>
      </div>
    </Teleport>
  </section>
</template>

<style scoped>
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

.price {
  width: 125px;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.animate-spin {
  animation: spin 1s linear infinite;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
  20%, 40%, 60%, 80% { transform: translateX(4px); }
}

.animate-shake {
  animation: shake 0.6s ease-in-out;
}

.border-red-300 {
  border-color: #fca5a5;
}

.bg-red-50 {
  background-color: #fef2f2;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>