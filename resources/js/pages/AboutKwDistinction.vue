<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Profil" />

  <div class="min-h-screen bg-[#f3f3f3] text-black overflow-hidden">

    <!-- Hero Section  -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h1 class="text-5xl md:text-6xl font-serif animate-slide-up uppercase">À propos de Kw Distinction</h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
      </div>
    </section>
    <section class="border-b-[4px] border-black">
      <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

          <!-- LEFT SIDE -->
          <div>

            <!-- IMAGE -->
            <div class="border border-[#c89a56] p-1 inline-block bg-white">
              <img
                src="/images/kw-distinction.png"
                alt="Nicolas Léveillé"
                class="w-[320px] md:w-[360px] object-cover"
              />
            </div>
          </div>

          <!-- RIGHT SIDE -->
          <div>
            <h1 class="text-5xl md:text-6xl font-black leading-tight mb-3">
            
            </h1>

            <p class="uppercase tracking-[0.25em] text-sm mb-10">
              
            </p>

            <!-- QUOTE -->
            <div class="flex items-center gap-5 mb-10">
              <div class="w-[4px] h-12 bg-[#c89a56]"></div>

              <p class="text-2xl font-light">
               
              </p>
            </div>

            <!-- CONTENT -->
            <div class="max-w-2xl">
              <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 leading-tight">
               
              </h2>

              <p class="text-xl leading-relaxed text-gray-800 mb-10">
               
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>