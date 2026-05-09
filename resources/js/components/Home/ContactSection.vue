<template>
  <section class="py-24 bg-gray-900 text-white relative overflow-hidden" id="contact">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl"></div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
      
      <div class="grid lg:grid-cols-2 gap-16 items-start">
        
        <!-- Left Side - Text Content -->
        <div class="space-y-8">
          <div>
            <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4">
              Tu peux compter sur moi pour élever le niveau.
            </p>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-serif leading-tight">
              Une présence forte. Une stratégie claire. Une transaction mieux menée.
            </h2>
          </div>

          <!-- Key promises -->
          <div class="space-y-4 pt-4">
            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une présence forte.</p>
              <p class="text-gray-400 text-sm">Disponible et réactive à chaque étape</p>
            </div>

            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une stratégie claire.</p>
              <p class="text-gray-400 text-sm">Chaque action a un objectif précis</p>
            </div>

            <div class="group cursor-pointer">
              <p class="font-bold text-lg">Une transaction mieux menée.</p>
              <p class="text-gray-400 text-sm">Jusqu'à la signature finale</p>
            </div>
          </div>
        </div>

        <!-- Right Side - Contact Form -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-2">PARLER À NICOLAS</h3>
          <p class="text-gray-500 text-sm mb-6">Réponse sous 24h, garantie.</p>

          <ContactForm/>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import ContactForm  from '@/components/ContactForm/ContactForm.vue'
</script>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, serif;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.animate-spin {
  animation: spin 1s linear infinite;
}
</style>