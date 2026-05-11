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
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Gatineau propose une vaste gamme de services et de commodités facilitant le quotidien de ses résidents. Centres commerciaux, épiceries, pharmacies, institutions financières, restaurants et commerces locaux sont facilement accessibles à travers les différents secteurs de la ville.Les résidents bénéficient également de nombreuses infrastructures sportives et communautaires, incluant des centres de conditionnement physique, des complexes sportifs, des arénas et des espaces récréatifs adaptés à tous les styles de vie. Le réseau de transport en commun permet aussi des déplacements efficaces à travers la région de l’Outaouais et vers Ottawa.",
  },
  {
    id: 3,
    title: "Une scène culinaire en pleine effervescence",
    body: "Gatineau propose une vaste gamme de services et de commodités facilitant le quotidien de ses résidents. Centres commerciaux, épiceries, pharmacies, institutions financières, restaurants et commerces locaux sont facilement accessibles à travers les différents secteurs de la ville.Les résidents bénéficient également de nombreuses infrastructures sportives et communautaires, incluant des centres de conditionnement physique, des complexes sportifs, des arénas et des espaces récréatifs adaptés à tous les styles de vie. Le réseau de transport en commun permet aussi des déplacements efficaces à travers la région de l’Outaouais et vers Ottawa.",
  },
  {
    id: 4,
    title: "Une scène culinaire en pleine effervescence",
    body: "La région de Gatineau se distingue par une offre gastronomique diversifiée qui saura plaire aux amateurs de bonne cuisine. Des cafés chaleureux aux restaurants raffinés, la ville propose une variété d’expériences culinaires inspirées de saveurs locales et internationales.Que ce soit pour un repas décontracté, une sortie entre amis ou une expérience gastronomique plus sophistiquée, les résidents profitent d’une scène culinaire dynamique et en constante évolution." 
  },
  {
    id: 5,
    title: "Accès aux soins de santé",
    body: "Les résidents de Gatineau ont accès à plusieurs établissements de santé, cliniques médicales et services spécialisés contribuant à leur bien-être et à leur tranquillité d’esprit. La proximité avec Ottawa permet également d’élargir l’accès à divers services médicaux et professionnels.Cette accessibilité aux soins de santé, combinée à la qualité des infrastructures de la région, contribue à faire de Gatineau un endroit recherché pour établir sa résidence principale."
  },
  {
    id: 6,
    title: "Activités de plein air et espaces verts",
    body: "Réputée pour son environnement naturel exceptionnel, Gatineau offre une multitude d’activités récréatives accessibles tout au long de l’année. Le célèbre Parc de la Gatineau constitue l’un des principaux attraits de la région grâce à ses sentiers, ses paysages et ses nombreuses activités saisonnières, notamment la randonnée, le vélo, le ski de fond et la raquette.La ville compte également plusieurs parcs urbains et espaces verts permettant aux résidents de profiter d’un mode de vie actif, équilibré et connecté à la nature."
  },
  {
    id: 7,
    title: "Le marché immobilier à Gatineau",
    body: "Le marché immobilier de Gatineau offre une grande diversité de propriétés répondant à différents styles de vie et budgets. Des condominiums modernes aux maisons unifamiliales, en passant par les propriétés haut de gamme, la région propose des opportunités intéressantes pour les acheteurs, vendeurs et investisseurs.En constante évolution, le marché immobilier de l’Outaouais demeure attractif grâce à sa qualité de vie, son accessibilité et son fort potentiel de croissance. Être bien accompagné par un courtier immobilier compétent représente un avantage important pour naviguer efficacement dans le marché actuel."
  },
  {
    id: 8,
    title: "Un accompagnement immobilier personnalisé",
    body: "Que vous souhaitiez acheter, vendre ou investir, Nicolas Léveillé s’engage à offrir un service personnalisé, des conseils stratégiques et un accompagnement professionnel à chaque étape de votre transaction immobilière. Son approche axée sur l’écoute, l’intégrité et la performance permet à ses clients d’avancer avec confiance dans la réalisation de leurs objectifs immobiliers."
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
                <CTASection />
            </div>
        </section>
    </div>
</template>