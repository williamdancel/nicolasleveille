<template>
  <Head title="Contact" />
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white py-32 overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
          Restons en contact
        </p>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-serif mb-6 animate-slide-up">
          CONTACT
        </h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto animate-scale"></div>
        <p class="text-gray-300 mt-6 max-w-2xl mx-auto">
          Réalisons vos rêves une maison à la fois
        </p>
      </div>
    </section>

    <!-- Main Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <div class="grid lg:grid-cols-2 gap-16">
          
          <!-- Left Side - Image / Illustration -->
          <div class="order-2 lg:order-1">
            <div class="sticky top-32">
              <div class="relative">
                <!-- Main Image Frame -->
                <div class="relative shadow-xl rounded-lg overflow-hidden">
                  <img 
                    src="/images/nicolas-contact-banner.jpg" 
                    alt="Dream home - Réaliser vos rêves une maison à la fois"
                    class="w-full h-auto object-cover rounded"
                    @error="handleImageError"
                  >
                </div>
              </div>

              <!-- Contact Info Cards Below Image -->
              <div class="mt-8 space-y-4">
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:shadow-md transition-shadow">
                  <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                  </div>
                  <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Téléphone</h3>
                    <a href="tel:+18195551234" class="text-gray-600 hover:text-red-500 transition-colors">
                      819-XXX-XXX
                    </a>
                  </div>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:shadow-md transition-shadow">
                  <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                  </div>
                  <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                    <a href="mailto:contact@nicolasleveille.ca" class="text-gray-600 hover:text-red-500 transition-colors">
                      contact@nicolasleveille.ca
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <!-- Right Side - Contact Form -->
          <div class="order-1 lg:order-2">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
              <h2 class="text-2xl font-bold text-gray-900 mb-2">PARLER À NICOLAS</h2>
              <p class="text-gray-500 text-sm mb-6">Je vous réponds sous 24h, garantie.</p>

              <ContactForm/>
              <!-- Social Media Links -->
              <div class="mt-6 pt-6 border-t border-gray-100">
                <p class="text-sm text-gray-500 text-center mb-3">Suivez-moi</p>
                <div class="flex justify-center gap-4">
                  <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300 text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                  </a>
                  <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300 text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0021.3-11.66c0-.21-.004-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                  </a>
                  <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300 text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451c.979 0 1.771-.773 1.771-1.729V1.729C24 .774 23.204 0 22.225 0z"/>
                    </svg>
                  </a>
                  <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300 text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import ContactForm  from '@/components/ContactForm/ContactFrom.vue'
import { Head } from '@inertiajs/vue3'

const handleImageError = (event: Event) => {
  const target = event.target as HTMLImageElement
  target.src = 'ttps://placehold.co/600x500/f3f4f6/9ca3af?text=Nicolas+L%C3%A9veill%C3%A9'
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
  0%, 100% { opacity: 0.05; }
  50% { opacity: 0.15; }
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