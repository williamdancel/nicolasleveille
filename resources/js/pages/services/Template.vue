<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, transparence et rigueur dans la réalisation de leurs projets immobiliers. Affilié à Keller Williams Distinction, il propose une approche humaine, stratégique et axée sur les résultats, afin d’offrir une expérience immobilière rassurante et adaptée aux besoins de chaque client.";

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Découvrir Gatineau",
    body: "Située au cœur de la région de l’Outaouais et bordée par la rivière des Outaouais, Gatineau est une ville dynamique reconnue pour sa qualité de vie exceptionnelle, son équilibre entre nature et milieu urbain, ainsi que sa proximité avec Ottawa.Grâce à ses quartiers diversifiés, ses établissements scolaires, ses espaces verts, ses infrastructures modernes et son économie en croissance, Gatineau attire autant les familles que les professionnels et les investisseurs immobiliers. La région offre un environnement de vie recherché où confort, accessibilité et vitalité se rencontrent.",
  },
]

</script>
<template>
    <Head title="Gatineau Ottawa" />
    <div class="min-h-screen bg-white">
        <!-- Hero Section -->
        <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <p class="text-[#ac8c4c] uppercase text-sm tracking-wider font-semibold mb-4 animate-fade-in">
                    L’Expérience Nicolas Léveillé
                </p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif max-w-4xl mx-auto animate-slide-up">
                    Courtier immobilier agréé | Région de Gatineau–Ottawa
                </h1>
                <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
            </div>
        </section>
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-16">
                    <p>{{ firstBodyContent }}
                    </p>
                </div>
                <div v-for="content in contents" 
                :key="content.id" class="mb-16">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-serif text-gray-900">{{content.title }}</h2>
                        <div class="w-16 h-0.5 bg-[#ac8c4c] mx-auto mt-4"></div>
                    </div>
                    <p>{{content.body }}
                    </p>
                </div>
                <CTASection/>
            </div>
        </section>
    </div>
</template>