<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted, watch } from 'vue'

const isScrolled = ref(false)
const isOpen = ref(false)

const handleScroll = () => {
  if (!isOpen.value) {
    isScrolled.value = window.scrollY > 50
  }
}

const toggleMenu = () => {
  isOpen.value = !isOpen.value
}

// Lock scroll when menu is open
watch(isOpen, (val) => {
  document.body.style.overflow = val ? 'hidden' : ''
})

// Close menu on resize 
const handleResize = () => {
  if (window.innerWidth >= 768) {
    isOpen.value = false
  }
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  window.removeEventListener('resize', handleResize)
})
</script>

<template>
  <!-- NAVBAR -->
  <header
    :class="[
      'fixed top-0 left-0 w-full transition-all duration-300',
      isScrolled || isOpen
        ? 'bg-[#101828]/90 backdrop-blur-md shadow-lg'
        : 'bg-transparent'
    ]"
    class="z-50"
  >
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between text-white">

      <!-- Logo -->
       <Link href="/">
        <img 
          src="/images/nicolas-leveille-logo.jpg"
          class="navbar-logo"
          width="160"
          height="64"
        />
      </Link>
      

      <!-- Desktop -->
      <nav class="hidden md:flex gap-8 tracking-wide navbar-menu">
        <Link href="/profil">PROFIL</Link>
        <Link href="/services">SERVICES</Link>
        <!-- <Link href="/properietes">PROPRIÉTÉS</Link> -->
        <Link href="/prestige">PRESTIGE</Link>
        <Link href="/parc-immoblier">PARC IMMOBILIER</Link>
        <!-- <Link href="/blogue">BLOGUE</Link> -->
        <Link href="/contact">CONTACT</Link>
      </nav>

      <!-- Hamburger -->
      <button
        @click="toggleMenu"
        class="md:hidden relative z-[70] flex flex-col gap-1"
      >
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
      </button>

    </div>
  </header>

  <!-- MOBILE MENU (OUTSIDE HEADER) -->
  <transition name="fade">
    <div
      v-if="isOpen"
      class="fixed inset-0 z-[60] bg-[#1a1820] flex flex-col items-center justify-center text-white text-lg"
    >
      <nav class="flex flex-col gap-6 text-center">
        <Link @click="toggleMenu" href="/profil">PROFIL</Link>
        <Link @click="toggleMenu" href="/services">SERVICES</Link>
        <!-- <Link @click="toggleMenu" href="/properietes">PROPRIÉTÉS</Link> -->
        <Link @click="toggleMenu" href="/prestige">PRESTIGE</Link>
        <Link @click="toggleMenu" href="/parc-immoblier">PARC IMMOBILIER</Link>
        <!-- <Link @click="toggleMenu" href="/blogue">BLOGUE</Link> -->
        <Link @click="toggleMenu" href="/contact">CONTACT</Link>
      </nav>

      <!-- Close -->
      <button
        @click="toggleMenu"
        class="absolute top-6 right-6 text-3xl"
      >
        ✕
      </button>
    </div>
  </transition>
</template>
