<template>
  <section ref="sectionRef" class="bg-gray-100 py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Text Content - Slides from LEFT to CENTER -->
      <div 
        class="intro-card transition-all duration-700 ease-out transform"
        :class="{ 
          'opacity-100 translate-x-0': textVisible,
          'opacity-0 -translate-x-full': !textVisible 
        }"
      >
        <p class="text-[#ac8c4c] uppercase text-sm tracking-widest mb-4 font-semibold">
          Un accompagnement stratégique et humain.
        </p>

        <h2 class="text-4xl md:text-5xl font-serif mb-6 text-gray-900">
          Qui est Nicolas Léveillé?
        </h2>

        <p class="text-gray-700 mb-4 leading-relaxed">
          Je t'aide à vendre ou acheter une propriété avec une approche directe,
          structurée et axée sur les résultats. Chaque mandat mérite une stratégie claire, 
          une exécution solide et une communication simple.
        </p>

        <p class="text-gray-700 leading-relaxed">
          Avec KW comme agence, je mise sur un service moderne, une mise en marché forte 
          et une négociation rigoureuse pour faire avancer ton projet immobilier avec confiance.
        </p>
      </div>

      <!-- Image with Frame - Slides from RIGHT to CENTER -->
      <div 
        class="flex justify-center transition-all duration-700 ease-out transform"
        :class="{ 
          'opacity-100 translate-x-0': imageVisible,
          'opacity-0 translate-x-full': !imageVisible 
        }"
      >
        <div class="bg-black p-4 md:p-6 shadow-xl transition-all duration-500 hover:shadow-2xl hover:scale-105">
          <img 
            src="/images/nicolas-approved-main.jpg" 
            alt="Nicolas Léveillé - Agent immobilier"
            class="w-80 md:w-96 object-cover"
          />
        </div>
      </div>

    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue'

// Reactive state
const textVisible = ref<boolean>(false)
const imageVisible = ref<boolean>(false)
const observer = ref<IntersectionObserver | null>(null)
const sectionRef = ref<HTMLElement | null>(null)

// Create and setup the intersection observer
const setupObserver = () => {
  observer.value = new IntersectionObserver(
    (entries: IntersectionObserverEntry[]) => {
      entries.forEach((entry: IntersectionObserverEntry) => {
        // Check if the section is visible in the viewport
        if (entry.isIntersecting) {
          // First, text slides in
          textVisible.value = true
          
          // Then image slides in after 200ms delay for staggered effect
          setTimeout(() => {
            imageVisible.value = true
          }, 200)
          
          // Stop observing once animation is triggered
          if (observer.value && entry.target) {
            observer.value.unobserve(entry.target)
          }
        }
      })
    },
    {
      threshold: 0.3, // Trigger when 30% of the section is visible
      rootMargin: '0px 0px -50px 0px'
    }
  )
  
  // Start observing the section element
  if (sectionRef.value) {
    observer.value.observe(sectionRef.value)
  }
}

// Lifecycle hooks
onMounted(() => {
  setupObserver()
})

onBeforeUnmount(() => {
  // Clean up observer when component is destroyed
  if (observer.value) {
    observer.value.disconnect()
  }
})


</script>

<style scoped>
.font-serif {
  font-family: 'Playfair Display', Georgia, 'Times New Roman', serif;
}

/* Smooth transitions for all elements */
.intro-card,
.flex.justify-center {
  transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1),
              transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Hover effect for the image frame */
.bg-black {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bg-black:hover {
  transform: scale(1.02);
  box-shadow: 0 25px 35px -12px rgba(0, 0, 0, 0.25);
}
</style>