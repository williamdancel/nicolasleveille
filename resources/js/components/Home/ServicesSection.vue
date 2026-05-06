<template>
  <section class="py-24 bg-white" id="services">
    <div class="max-w-7xl mx-auto px-6">
    
      <!-- Three pillars with refined design -->
      <div class="grid md:grid-cols-3 gap-12 lg:gap-16">
        
        <!-- 1. Marketing -->
        <div class="group text-center md:text-left">
          <div class="mb-6 inline-flex md:block">
            <div class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-[#ac8c4c] transition-colors duration-300 bg-white shadow-sm">
              <svg class="w-6 h-6 text-gray-700 group-hover:text-[#ac8c4c] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Marketing </h3>
          <p class="text-gray-500 leading-relaxed">
            Photos, diffusion, mise en valeur et positionnement clair.
          </p>
          <div class="mt-4 text-sm font-medium text-gray-400 hidden md:block">
            —
          </div>
        </div>

        <!-- 2. Negotiation -->
        <div class="group text-center md:text-left">
          <div class="mb-6 inline-flex md:block">
            <div class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-[#ac8c4c] transition-colors duration-300 bg-white shadow-sm">
              <svg class="w-6 h-6 text-gray-700 group-hover:text-[#ac8c4c] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2h-2M9 5h7a2 2 0 012 2v2m-2 7v2m0 0h2m-2 0v2m0-2h2"/>
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Négociation </h3>
          <p class="text-gray-500 leading-relaxed">
            Une approche structurée pour mieux défendre ton prix.
          </p>
          <div class="mt-4 text-sm font-medium text-gray-400 hidden md:block">
            —
          </div>
        </div>

        <!-- 3. Accompaniment -->
        <div class="group text-center md:text-left">
          <div class="mb-6 inline-flex md:block">
            <div class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-[#ac8c4c] transition-colors duration-300 bg-white shadow-sm">
              <svg class="w-6 h-6 text-gray-700 group-hover:text-[#ac8c4c] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Accompagnement </h3>
          <p class="text-gray-500 leading-relaxed">
            Suivi simple, rapide et humain du début à la signature.
          </p>
          <div class="mt-4 text-sm font-medium text-gray-400 hidden md:block">
            —
          </div>
        </div>
      </div>

    </div>
  </section>
</template>

<script lang="ts">
export default {
  name: 'ServicesSection'
}
</script>