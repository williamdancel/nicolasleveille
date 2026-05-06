
<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import CTASection from '@/components/CTA/CTASection.vue'
</script>

<template>
  <Head title="Services"/>
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
          Notre expertise
        </p>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif max-w-4xl mx-auto animate-slide-up">
          Un service de courtier immobilier pour vendre et acheter une propriété
        </h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
      </div>
    </section>

    <!-- Main Content - No Transitions -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Intro Text -->
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-3xl font-serif text-gray-900 mb-4">
            Un service première classe et personnalisé.
          </h2>
          <p class="text-gray-600 leading-relaxed">
            Je mets en place une structure claire pour vendre ou acheter avec plus de confiance, 
            moins de friction et plus d'impact sur le résultat final.
          </p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          <!-- Service 1 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Connaissance et expertise du marché</h3>
            <p class="text-gray-500 text-sm">
              Analyse approfondie du marché local, tendances et opportunités pour maximiser votre investissement.
            </p>
          </div>

          <!-- Service 2 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Réseau étendu et accès aux annonces</h3>
            <p class="text-gray-500 text-sm">
              Accès exclusif aux propriétés dès leur mise en marché et réseau de partenaires privilégiés.
            </p>
          </div>

          <!-- Service 3 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Stratégies de marketing et de publicité</h3>
            <p class="text-gray-500 text-sm">
              Campagnes publicitaires ciblées, mise en marché professionnelle et visibilité optimale.
            </p>
          </div>

          <!-- Service 4 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2h-2M9 5h7a2 2 0 012 2v2m-2 7v2m0 0h2m-2 0v2m0-2h2"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Négociation et expertise contractuelle</h3>
            <p class="text-gray-500 text-sm">
              Négociation rigoureuse, protection de vos intérêts et expertise des documents légaux.
            </p>
          </div>

          <!-- Service 5 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Gain en temps et moins de stress</h3>
            <p class="text-gray-500 text-sm">
              Gestion complète du processus, coordination des visites et suivi personnalisé.
            </p>
          </div>

          <!-- Service 6 -->
          <div class="group bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all duration-300">
            <div class="w-14 h-14 bg-[#ac8c4c] rounded-lg flex items-center justify-center mb-5 group-hover:bg-[#ac8c4c]/80 transition-colors duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Aperçu du marché et conseils</h3>
            <p class="text-gray-500 text-sm">
              Rapports de marché personnalisés, conseils stratégiques et accompagnement sur mesure.
            </p>
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

/* Hover Effects for Service Cards */
.group {
  transition: all 0.3s ease;
}

.group:hover {
  transform: translateY(-5px);
}
</style>