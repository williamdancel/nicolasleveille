<script setup lang="ts">
import Footer from '@/layouts/Footer.vue'
import Navbar from '@/layouts/Navbar.vue'
</script>

<template>
  <div>
    <Navbar />
    <main>
      <slot />
    </main>
    <Footer />
  </div>
</template>