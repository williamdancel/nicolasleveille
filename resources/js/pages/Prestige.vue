<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import CTASection from '@/components/CTA/CTASection.vue'
</script>

<template>
  <Head title="Prestige"/>
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white py-32 overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl  animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <div class="flex justify-center mb-6">
          <div class="w-12 h-12 border border-[#ac8c4c] rounded-full flex items-center justify-center ">
            <div class="w-6 h-6 bg-[#ac8c4c] rotate-45"></div>
          </div>
        </div>
        <h1 class="text-6xl md:text-7xl lg:text-7xl font-serif tracking-wider mb-4 animate-fade-in">
          PRESTIGE
        </h1>
        <h2 class="text-2xl md:text-3xl font-serif text-gray-300 animate-slide-up">
          Propriétés haut de gamme
        </h2>
        <div class="w-16 h-px bg-[#ac8c4c] mx-auto mt-8 animate-scale"></div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- First Block -->
        <div class="max-w-4xl mx-auto text-center mb-20">
          <p class="text-gray-600 text-xl leading-relaxed">
            Une image de marque plus forte, une clientèle qualifiée et une mise en marché 
            pensée pour les biens de prestige.
          </p>
        </div>

        <!-- Decorative divider -->
        <div class="flex justify-center mb-20">
          <div class="flex items-center gap-4">
            <div class="w-16 h-px bg-gray-300"></div>
            <span class="text-[#ac8c4c] text-xl">✦</span>
            <div class="w-16 h-px bg-gray-300"></div>
          </div>
        </div>

        <!-- Second Block -->
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-10">
            <h3 class="text-3xl md:text-4xl font-serif text-gray-900 mb-6">
              Le bon positionnement pour les propriétés d'exception
            </h3>
          </div>
          
          <p class="text-gray-600 text-lg leading-relaxed text-center mb-12">
            Le segment prestige demande plus qu'une annonce. Il faut une présentation irréprochable, 
            un narratif cohérent, des visuels puissants et une gestion rigoureuse des acheteurs qualifiés.
          </p>

          <!-- Features Grid -->
          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            <div class="text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
              <div class="w-14 h-14 bg-[#ac8c4c] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
              </div>
              <h4 class="font-bold text-gray-900 mb-2">Présentation irréprochable</h4>
              <p class="text-sm text-gray-500">Mise en scène parfaite de chaque propriété</p>
            </div>

            <div class="text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
              <div class="w-14 h-14 bg-[#ac8c4c] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
              </div>
              <h4 class="font-bold text-gray-900 mb-2">Narratif cohérent</h4>
              <p class="text-sm text-gray-500">Une histoire unique pour chaque bien</p>
            </div>

            <div class="text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
              <div class="w-14 h-14 bg-[#ac8c4c] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <h4 class="font-bold text-gray-900 mb-2">Visuels puissants</h4>
              <p class="text-sm text-gray-500">Photographie et vidéos professionnelles</p>
            </div>

            <div class="text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
              <div class="w-14 h-14 bg-[#ac8c4c] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
              </div>
              <h4 class="font-bold text-gray-900 mb-2">Gestion rigoureuse</h4>
              <p class="text-sm text-gray-500">Acheteurs qualifiés et accompagnement sur mesure</p>
            </div>
          </div>
        </div>

        <CTASection/>
      </div>
    </section>
  </div>
</template>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

</style>