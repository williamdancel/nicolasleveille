
<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import CTASection from '@/components/CTA/CTASection.vue'
</script>

<template>
  <Head title="Parc Immobilier"/>
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white py-32 overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl  animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
          Investissement stratégique
        </p>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-serif mb-6 animate-slide-up">
          Placements immobiliers
        </h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto animate-scale"></div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Intro Section -->
        <div class="max-w-4xl mx-auto text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-6">
            La vision dont vous avez besoin pour investir dans l'immobilier
          </h2>
          <p class="text-gray-600 text-lg leading-relaxed">
            Le marché des immeubles à revenu demande une vision claire, une capacité d'analyse sérieuse 
            et un accompagnement plus structuré. Je t'aide à mieux évaluer les occasions et à prendre 
            des décisions solides.
          </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
          
          <!-- Service personnalisé -->
          <div class="group text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-16 h-16 bg-[#b08d4e] rounded-full flex items-center justify-center mx-auto mb-4 Namegroup-hover:bg-red-300 transition-colors duration-300">
              <svg class="w-8 h-8 text-white group-hover:text-red-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Service personnalisé</h3>
            <p class="text-gray-500 text-sm">
              Une approche sur mesure adaptée à vos objectifs d'investissement
            </p>
          </div>

          <!-- Compréhension -->
          <div class="group text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-16 h-16 bg-[#b08d4e] rounded-full flex items-center justify-center mx-auto mb-4 Namegroup-hover:bg-red-300 transition-colors duration-300">
              <svg class="w-8 h-8 text-white group-hover:text-red-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Compréhension</h3>
            <p class="text-gray-500 text-sm">
              Analyse approfondie de vos besoins et du marché immobilier
            </p>
          </div>

          <!-- Analyse -->
          <div class="group text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-16 h-16 bg-[#b08d4e] rounded-full flex items-center justify-center mx-auto mb-4 Namegroup-hover:bg-red-300 transition-colors duration-300">
              <svg class="w-8 h-8 text-white group-hover:text-red-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Analyse</h3>
            <p class="text-gray-500 text-sm">
              Étude rigoureuse des opportunités et des rendements potentiels
            </p>
          </div>

          <!-- Accompagnement -->
          <div class="group text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-16 h-16 bg-[#b08d4e] rounded-full flex items-center justify-center mx-auto mb-4 Namegroup-hover:bg-red-300 transition-colors duration-300">
              <svg class="w-8 h-8 text-white group-hover:text-red-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Accompagnement</h3>
            <p class="text-gray-500 text-sm">
              Support continu à chaque étape de votre projet d'investissement
            </p>
          </div>
        </div>

        <!-- Investment Types Section -->
        <div class="mb-20">
          <div class="text-center mb-12">
            <h3 class="text-2xl md:text-3xl font-serif text-gray-900 mb-4">
              Types d'investissements
            </h3>
            <div class="w-16 h-0.5 bg-[#ac8c4c] mx-auto"></div>
          </div>

          <div class="grid md:grid-cols-3 gap-8">
            <!-- Immeubles à revenu -->
            <div class="border border-gray-200 rounded-lg p-6 hover:border-red-200 hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 bg-[#b08d4e] rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
              </div>
              <h4 class="text-lg font-bold text-gray-900 mb-2">Immeubles à revenu</h4>
              <p class="text-gray-500 text-sm">Multilogements, immeubles locatifs et rentabilité optimisée</p>
            </div>

            <!-- Propriétés commerciales -->
            <div class="border border-gray-200 rounded-lg p-6 hover:border-red-200 hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 bg-[#b08d4e] rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
              </div>
              <h4 class="text-lg font-bold text-gray-900 mb-2">Propriétés commerciales</h4>
              <p class="text-gray-500 text-sm">Locaux commerciaux, bureaux et espaces à rendement</p>
            </div>

            <!-- Terrains à développement -->
            <div class="border border-gray-200 rounded-lg p-6 hover:border-red-200 hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 bg-[#b08d4e] rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
              </div>
              <h4 class="text-lg font-bold text-gray-900 mb-2">Terrains à développement</h4>
              <p class="text-gray-500 text-sm">Potentiel de valorisation et projets sur mesure</p>
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