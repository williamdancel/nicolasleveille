<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
</script>
<template>
  <Head title="Équipe" />
  <div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        <h1 class="text-5xl md:text-6xl font-serif animate-slide-up">PROFIL</h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
      </div>
    </section>

    <!-- Content -->
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-6">
        
        <!-- Nicolas Section -->
        <div class="grid lg:grid-cols-2 gap-16 items-start mb-20">
          <!-- Photo - Slides from left -->
          <div class="flex justify-center animate-slide-from-left">
            <div class="bg-black p-4 shadow-xl transition-all duration-500 hover:shadow-2xl hover:scale-105">
              <div class="w-80 h-96 bg-gray-300 flex items-center justify-center">
                <img src="/images/nicolas-leveille.jpg" alt="Nicolas Léveillé" class="w-full h-full object-cover">
              </div>
            </div>
          </div>

          <!-- Bio - Slides from right -->
          <div class="animate-slide-from-right">
            <h2 class="text-4xl font-serif text-gray-900 mb-3">Nicolas Léveillé</h2>
            <p class="text-[#ac8c4c] font-semibold mb-6">
              Président fondateur, courtier immobilier résidentiel.
            </p>
            
            <div class="border-l-4 border-[#ac8c4c] pl-6 mb-8 italic text-gray-700">
              Service haut de gamme. Accompagnement client, stratégie et exécution de mise en marché.
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-4">FAITES PARTIE DE NOTRE SUCCÈS</h3>
            <p class="text-gray-600 mb-4">Une vision claire et une image forte.</p>
            <p class="text-gray-600">
              Partagez avec nous une approche moderne, ambitieuse et fortement orientée 
              résultats pour le marché immobilier de l'Outaouais.
            </p>
          </div>
        </div>

       
      </div>
    </section>
  </div>
</template>
<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

/* Keyframe Animations */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
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

@keyframes slideFromLeft {
  from {
    opacity: 0;
    transform: translateX(-100px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideFromRight {
  from {
    opacity: 0;
    transform: translateX(100px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
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

.animate-slide-from-left {
  animation: slideFromLeft 0.8s ease-out forwards;
}

.animate-slide-from-right {
  animation: slideFromRight 0.8s ease-out forwards;
}

.animate-scale {
  animation: scale 0.6s ease-out 0.3s forwards;
  transform-origin: center;
}

.animate-scale-delayed {
  animation: scale 0.6s ease-out 0.5s forwards;
  transform-origin: center;
}

.animate-fade-in-up {
  animation: slideUp 0.6s ease-out forwards;
  opacity: 0;
}

.animate-pulse-slow {
  animation: pulse 4s ease-in-out infinite;
}

/* Delay Utilities */
.animation-delay-200 {
  animation-delay: 0.2s;
}

.animation-delay-300 {
  animation-delay: 0.3s;
}

.animation-delay-400 {
  animation-delay: 0.4s;
}

.animation-delay-500 {
  animation-delay: 0.5s;
}

.animation-delay-1000 {
  animation-delay: 1s;
}

/* Hover effects */
.bg-black {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bg-black:hover {
  transform: scale(1.02);
  box-shadow: 0 25px 35px -12px rgba(0, 0, 0, 0.25);
}

/* Team card hover effects */
.group:hover .group-hover\:scale-105 {
  transform: scale(1.05);
}

.group {
  transition: all 0.3s ease;
}

.group:hover {
  transform: translateY(-5px);
}
</style>