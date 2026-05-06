<script setup lang="ts">
  import { Link } from '@inertiajs/vue3'
</script>
<template>
        <div class="mt-20 text-center bg-gray-900 rounded-2xl p-12">
          <h3 class="text-2xl font-serif text-white mb-4">
            Prêt à concrétiser votre projet immobilier?
          </h3>
          <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
            Discutons de vos objectifs et élaborons ensemble une stratégie gagnante.
          </p>
          <Link 
            href="/contact" 
            class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg transition-all duration-300"
          >
           Contactez-nous
          </Link>
        </div>
</template>