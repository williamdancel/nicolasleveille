<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import ServicesSection from '@/components/Home/ServicesSection.vue'
import TestimonialSection from '@/components/Home/TestimonialSection.vue'
</script>

<template>
  <Head title="Vendre" />

  <div class="min-h-screen bg-[#f3f3f3] text-black overflow-hidden">

    <!-- Hero Section  -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h1 class="text-5xl md:text-6xl font-serif animate-slide-up">Vendre</h1>
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
                src="/images/nicolas-leveille-vendre.jpg"
                alt="Nicolas Léveillé Vendre"
                class="w-[320px] md:w-[515px] object-cover"
              />
            </div>
          </div>

          <!-- RIGHT SIDE -->
          <div>
            <!-- LOGOS -->
            <div class="flex items-center gap-6 mb-8">
              <img
                src="/images/nicolas-leveille-logo-removebg-preview.png"
                alt="Nicolas"
                class="h-16 object-contain"
              />

              <img
                src="/images/kw-distinction.png"
                alt="KW"
                class="h-12 object-contain"
              />
            </div>
            <p class="text-3xl md:text-4xl font-black uppercase mb-6 leading-tight">
              Un service premier personnalisé.
            </p>
            <!-- ÉVALUATION GRATUITE -->
          <div>
            <Link 
              href="/evaluation-gratuite" 
              class="bg-[#b0884c] text-white px-5 py-4 rounded-lg hover:bg-[#96733f] transition-colors duration-200 font-black text-3xl md:text-3xl leading-none mb-4 inline-block"
            >
              Évaluation gratuite
            </Link>
          </div>
          </div>
        </div>
      </div>
    </section>
    <TestimonialSection />
    <ServicesSection />

  </div>
</template>