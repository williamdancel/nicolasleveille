<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <section class="relative min-h-screen flex items-center bg-black text-white overflow-hidden">

    <!-- Background -->
    <img 
      src="/images/nicolas-team-hero.jpg" 
      class="absolute inset-0 w-full h-full object-cover opacity-60"
    />

    <!-- Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20">
      
      <!-- Grid layout with better spacing -->
      <div class="grid md:grid-cols-2 gap-8 md:gap-10">
        
        <!-- Left -->
        <div class="text-center md:text-left">
          <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif leading-tight">
            Avec Léveillé,<br />
            c’est acheté.
          </h1>

          <p class="mt-4 text-base sm:text-lg opacity-80">
            Nicolas Léveillé | Courtier immobilier Gatineau
          </p>
          <p class="mt-2 text-base sm:text-lg opacity-80">
            Aylmer, Hull, Chelsea, Gatineau, Pontiac
          </p>
        </div>

        <!-- Right -->
        <div class="flex flex-col justify-center items-center md:items-start text-center md:text-left">
          <p class="uppercase text-xs sm:text-sm tracking-widest mb-2">
            KW Keller Williams
          </p>

          <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif leading-tight mb-4 sm:mb-6 max-w-md">
            Un service première classe et personnalisé.
          </h2>

          <!-- Buttons - side by side even on mobile -->
          <div class="flex flex-row gap-3 sm:gap-4">
            <a 
              href="tel:8196642182" 
              class="bg-red-600 px-4 sm:px-6 py-2.5 sm:py-3 rounded-full text-sm sm:text-base text-center whitespace-nowrap hover:bg-red-700 transition-colors"
            >
              Appelez-moi
            </a>
            <Link 
              href="/evaluation-gratuite" 
              class="bg-[#ac8c4c] text-white px-4 sm:px-6 py-2.5 sm:py-3 rounded text-sm sm:text-base text-center whitespace-nowrap hover:bg-[#8b6e3a] transition-colors"
            >
              Évaluation gratuite
            </Link>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>