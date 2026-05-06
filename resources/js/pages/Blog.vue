<template>
  <Head title="Blogue" />
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white py-32 overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
          Partage d'expertise
        </p>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-serif mb-6 animate-slide-up">
          BLOGUE
        </h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto animate-scale"></div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Intro Section -->
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-4">
            Le blogue de Nicolas Léveillé
          </h2>
          <p class="text-gray-500 text-lg">
            Pour des conseils plus personnalisés
          </p>
          <div class="w-16 h-0.5 bg-[#ac8c4c] mx-auto mt-6"></div>
        </div>

        <!-- Category Title -->
        <div class="mb-12">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-1 h-8 bg-[#ac8c4c]"></div>
            <h3 class="text-2xl font-serif text-gray-900">Investissement locatif</h3>
          </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          <!-- Post 1 - Bail commercial 101 -->
          <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="relative h-56 overflow-hidden bg-gray-200">
              <img 
                src="/images/blog/commercial-lease.jpg" 
                alt="Bail commercial 101"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
              <div class="absolute top-4 left-4">
                <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Commercial</span>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-sm text-gray-400 mb-3">
                <span>15 mars 2024</span>
                <span>•</span>
                <span>5 min de lecture</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-500 transition-colors">
                Bail commercial 101
              </h3>
              <p class="text-gray-500 mb-4 leading-relaxed">
                Les éléments à surveiller avant de s'engager sur un actif ou un espace commercial.
              </p>
              <Link 
                href="/blog/bail-commercial-101" 
                class="inline-flex items-center gap-2 text-red-600 font-medium hover:gap-3 transition-all"
              >
                Lire l'article
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </Link>
            </div>
          </article>

          <!-- Post 2 - L'ABC de l'investissement immobilier locatif -->
          <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="relative h-56 overflow-hidden bg-gray-200">
              <img 
                src="/images/blog/real-estate-investment.jpg" 
                alt="L'ABC de l'investissement immobilier locatif"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
              <div class="absolute top-4 left-4">
                <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Conseils</span>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-sm text-gray-400 mb-3">
                <span>8 mars 2024</span>
                <span>•</span>
                <span>7 min de lecture</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-500 transition-colors">
                L'ABC de l'investissement immobilier locatif
              </h3>
              <p class="text-gray-500 mb-4 leading-relaxed">
                Les bases utiles pour mieux comprendre une acquisition locative.
              </p>
              <Link 
                href="/blog/abc-investissement-locatif" 
                class="inline-flex items-center gap-2 text-red-600 font-medium hover:gap-3 transition-all"
              >
                Lire l'article
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </Link>
            </div>
          </article>

          <!-- Post 3 - Protéger votre investissement -->
          <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="relative h-56 overflow-hidden bg-gray-200">
              <img 
                src="/images/blog/protect-investment.jpg" 
                alt="Protéger votre investissement"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                @error="handleImageError"
              >
              <div class="absolute top-4 left-4">
                <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Protection</span>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-sm text-gray-400 mb-3">
                <span>28 février 2024</span>
                <span>•</span>
                <span>6 min de lecture</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-500 transition-colors">
                Protéger votre investissement
              </h3>
              <p class="text-gray-500 mb-4 leading-relaxed">
                Pourquoi le bon inspecteur et les bons vérificateurs changent la qualité d'une transaction.
              </p>
              <Link 
                href="/blog/proteger-investissement" 
                class="inline-flex items-center gap-2 text-red-600 font-medium hover:gap-3 transition-all"
              >
                Lire l'article
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </Link>
            </div>
          </article>
        </div>

      </div>
    </section>
  </div>
</template>

<script setup lang=ts>
import { Link, Head } from '@inertiajs/vue3'

const handleImageError = (event: Event) => {
  const target = event.target as HTMLImageElement
  target.src = 'https://placehold.co/600x400/f3f4f6/9ca3af?text=Article'
}
</script>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
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