<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import CTASection from '@/components/CTA/CTASection.vue'

interface Agent {
  id: number
  name: string
  title: string
  slug: string
}

const agents: Agent[] = [
  {
    id: 1,
    name: 'Région de Gatineau–Ottawa',
    title: 'courtier immobilier résidentiel',
    slug: 'gatineau-ottawa'
  },
  {
    id: 2,
    name: 'Secteur Aylmer',
    title: 'courtier immobilier résidentiel',
    slug: 'secteur-aylmer'
  },
  {
    id: 3,
    name: 'Secteur Hull',
    title: 'courtier immobilier résidentiel',
    slug: 'secteur-hull'
  },
  {
    id: 4,
    name: 'Secteur Wakefield',
    title: 'courtier immobilier résidentiel',
    slug: 'secteur-wakefield'
  },
  {
    id: 5,
    name: 'Région de l’Outaouais et Pontiac',
    title: 'courtier immobilier résidentiel',
    slug: 'region-de-l-outaouanis-et-pontiac'
  },
  {
    id: 6,
    name: 'Secteur Chelsea',
    title: 'courtier immobilier résidentiel',
    slug: 'secteur-chelsea'
  },
  {
    id: 7,
    name: 'Secteur Buckingham & Masson-Angers',
    title: 'courtier immobilier résidentiel',
    slug: 'secteur-buckingham-masson-angers'
  },
  
]
</script>

<template>
  <Head title="Services" />
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

    <!-- Main Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Agents Section -->
        <div class="mb-16">
          <!-- Section Header -->
          <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif text-gray-900">Courtier Immobilier</h2>
            <div class="w-16 h-0.5 bg-[#ac8c4c] mx-auto mt-4"></div>
          </div>

          <!-- Agents Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <Link 
              v-for="agent in agents" 
              :key="agent.id"
              :href="`/services/${agent.slug}`"
              class="group block"
            >
              <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="p-6 text-center">
                  <h3 class="text-xl font-bold text-gray-800 mb-1">{{ agent.name }}</h3>
                  <p class="text-[#ac8c4c] text-sm font-medium mb-3">{{ agent.title }}</p>
                </div>
              </div>
            </Link>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
          <!-- Acheter avec mauvais crédit -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 p-8 text-center">
            <h2 class="text-xl md:text-2xl font-serif text-gray-900 mb-4">Acheter une maison avec un mauvais crédit</h2>
            <p class="text-gray-600 text-sm mb-6">Découvrez les solutions adaptées à votre situation financière</p>
            <Link 
              href="/services/acheter-une-maison-avec-un-mauvais-credit" 
              class="inline-block bg-[#ac8c4c] hover:bg-[#8f6e3a] text-white font-semibold px-6 py-2.5 rounded-lg transition-all duration-300 hover:scale-105 shadow-md"
            >
              En savoir plus
            </Link>
          </div>

          <!-- Reprise de possession -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 p-8 text-center">
            <h2 class="text-xl md:text-2xl font-serif text-gray-900 mb-4">Reprise de possession</h2>
            <p class="text-gray-600 text-sm mb-6">Accompagnement expert pour les propriétés en reprise de possession</p>
            <Link 
              href="/services/reprise-de-possession" 
              class="inline-block bg-[#ac8c4c] hover:bg-[#8f6e3a] text-white font-semibold px-6 py-2.5 rounded-lg transition-all duration-300 hover:scale-105 shadow-md"
            >
              En savoir plus
            </Link>
          </div>

          <!-- Pourquoi un Courtier Immobilier -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 p-8 text-center">
            <h2 class="text-xl md:text-2xl font-serif text-gray-900 mb-4">Pourquoi un Courtier Immobilier?</h2>
            <p class="text-gray-600 text-sm mb-6">Les avantages d'être accompagné par un expert certifié</p>
            <Link 
              href="/services/un-service-de-courtier-immobilier" 
              class="inline-block bg-[#ac8c4c] hover:bg-[#8f6e3a] text-white font-semibold px-6 py-2.5 rounded-lg transition-all duration-300 hover:scale-105 shadow-md"
            >
              En savoir plus
            </Link>
          </div>
        </div>

        <CTASection />
      </div>
    </section>
  </div>
</template>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

/* Delay Utilities */
.animation-delay-1000 {
  animation-delay: 1s;
}

/* Animation keyframes */
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slide-up {
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
    transform: scaleX(0);
    opacity: 0;
  }
  to {
    transform: scaleX(1);
    opacity: 1;
  }
}

@keyframes pulse-slow {
  0%, 100% {
    opacity: 0.5;
    transform: scale(1);
  }
  50% {
    opacity: 0.8;
    transform: scale(1.05);
  }
}

.animate-fade-in {
  animation: fade-in 0.8s ease forwards;
}

.animate-slide-up {
  animation: slide-up 0.8s ease forwards;
}

.animate-scale {
  animation: scale 0.6s ease forwards;
}

.animate-pulse-slow {
  animation: pulse-slow 6s ease-in-out infinite;
}
</style>