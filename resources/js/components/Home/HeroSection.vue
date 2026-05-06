
<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <section class="relative h-screen flex items-center bg-black text-white">

    <!-- Background -->
    <img 
      src="/images/nicolas-team-hero.jpg" 
      class="absolute inset-0 w-full h-full object-cover opacity-60"
    />

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 hero-content">

      <!-- Left -->
      <div>
        <h1 class="text-5xl md:text-6xl font-serif leading-tight">
          C’est Vu,<br />
          C’est Vendu.
        </h1>

        <p class="mt-4 text-lg opacity-80">
          Nicolas Léveillé | Courtier immobilier Gatineau
        </p>
        <p class="mt-4 text-lg opacity-80">
          Aylmer, Hull, Chelsea, Gatineau, Pontiac
        </p>
      </div>

      <!-- Right -->
      <div class="flex flex-col justify-center items-start">
        <p class="uppercase text-sm tracking-widest mb-2">
          KW Keller Williams
        </p>

        <h2 class="text-4xl font-serif leading-tight mb-6">
          Un service première classe et personnalisé.
        </h2>

        <div class="flex gap-4">
          <a href="tel:819-xxx-xxx" class="bg-red-600 px-6 py-3 rounded-full">
            Appelez-moi
          </a>
          <Link href="/contact" class="bg-gray-200 text-black px-6 py-3 rounded">
            Évaluation gratuite
          </Link>
        </div>
      </div>

    </div>
  </section>
</template>