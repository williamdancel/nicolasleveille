<template>
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="grid md:grid-cols-3 gap-8 mb-8">
        
        <!-- Contact Column -->
        <div>
          <h4 class="font-semibold text-lg mb-4 text-[#ac8c4c]">Contact</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="tel:+8196642182">819.664.2182</a></li>
            <li>nicolas.leveille@kw.com</li>
            <li>259 Blvd Saint-Joseph #104, Gatineau</li>
          </ul>
        </div>

        <!-- Navigation Column -->
        <div>
          <h4 class="font-semibold text-lg mb-4 text-[#ac8c4c]">Navigation</h4>
          <ul class="space-y-2">
            <li><Link href="/profil" class="text-gray-400 hover:text-[#ac8c4c] transition-colors">Profil</Link></li>
            <li><Link href="/services" class="text-gray-400 hover:text-[#ac8c4c] transition-colors">Services</Link></li>
            <li><Link href="/parc-immoblier" class="text-gray-400 hover:text-[#ac8c4c] transition-colors">Parc immobilier</Link></li>
            <li><Link href="/contact" class="text-gray-400 hover:text-[#ac8c4c] transition-colors">Contact</Link></li>
          </ul>
        </div>

        <!-- KW Column -->
        <div>
          <h4 class="font-semibold text-lg mb-4 text-[#ac8c4c]">KW</h4>
          <p class="text-gray-400 text-sm">Image premium, stratégie claire, exécution forte.</p>
        </div>
      </div>

      <!-- Bottom bar -->
      <div class="pt-6 border-t border-gray-800 text-center text-sm text-gray-500">
        <p>&copy; {{ currentYear }} Nicolas Léveillé - Courtier immobilier</p>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

// Computed property
const currentYear = computed<number>(() => {
  return new Date().getFullYear()
})
</script>