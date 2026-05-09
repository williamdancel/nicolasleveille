<script setup lang="ts">
import AboutSection from '@/components/Home/AboutSection.vue'
import ContactSection from '@/components/Home/ContactSection.vue'
import HeroSection from '@/components/Home/HeroSection.vue'
// import PropertiesSection from '@/components/Home/PropertiesSection.vue'
import ServicesSection from '@/components/Home/ServicesSection.vue'
import TestimonialSection from '@/components/Home/TestimonialSection.vue'
import WhySection from '@/components/Home/WhySection.vue'
import StickyButton from '@/components/StickyButton/StickyButton.vue'
</script>

<template>
  <div>
    <StickyButton/>
    <HeroSection />
    <AboutSection />
    <WhySection />
    <TestimonialSection />
    <ServicesSection />
    <!-- <PropertiesSection /> -->
    <ContactSection />
  </div>
</template>