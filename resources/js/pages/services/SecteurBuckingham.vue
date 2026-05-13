<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, rigueur et transparence dans leurs projets immobiliers dans la région de Gatineau–Ottawa. Affilié à Keller Williams Distinction, il privilégie une approche personnalisée axée sur l’écoute, le conseil stratégique et la qualité du service.";

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Vivre à Buckingham et Masson-Angers",
    body: "Situés dans l’est de Gatineau, les secteurs de Buckingham et Masson-Angers offrent un environnement paisible combinant nature, esprit communautaire et accessibilité. Reconnus pour leur qualité de vie et leur ambiance familiale, ces secteurs attirent les résidents à la recherche d’un cadre de vie équilibré à proximité des grands centres urbains. Avec leurs paysages naturels, leurs services de proximité et leur marché immobilier accessible, Buckingham et Masson-Angers représentent des secteurs de choix pour les familles, les premiers acheteurs et les investisseurs.",
  },
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Buckingham et Masson-Angers offrent une vaste gamme de commodités essentielles facilitant le quotidien des résidents. Épiceries, pharmacies, commerces locaux, restaurants, institutions financières et centres communautaires contribuent à créer un environnement pratique et convivial. Les résidents profitent également d’un accès rapide aux services et infrastructures de Gatineau, tout en bénéficiant d’un cadre plus calme et résidentiel.",
  },
  {
    id: 3,
    title: "Accès aux services de santé",
    body: "Les secteurs de Buckingham et Masson-Angers bénéficient d’un accès pratique à plusieurs services de santé importants dans la région. Les résidents peuvent compter sur des établissements médicaux, cliniques et services spécialisés accessibles à proximité, offrant un soutien essentiel pour les familles et les professionnels. La proximité des principaux centres urbains permet également un accès rapide à une offre complète de soins de santé.",
  },
  {
    id: 4,
    title: "Activités de plein air et loisirs",
    body: "Entourés par la nature, Buckingham et Masson-Angers proposent une multitude d’activités extérieures accessibles tout au long de l’année. Les résidents peuvent profiter de sentiers pédestres, pistes cyclables, espaces verts et accès à la rivière Gatineau pour pratiquer diverses activités récréatives. Randonnée, vélo, canotage, pêche et activités familiales font partie du quotidien dans ces secteurs reconnus pour leur environnement naturel et leur qualité de vie.",
  },
  {
    id: 5,
    title: "Vie culturelle et ambiance communautaire",
    body: "Buckingham et Masson-Angers possèdent une forte identité communautaire et une ambiance chaleureuse appréciée des résidents. Plusieurs événements locaux, activités culturelles et rassemblements communautaires contribuent au dynamisme du secteur et au sentiment d’appartenance. Les résidents profitent également d’une scène culturelle locale mettant en valeur les artistes, artisans et initiatives communautaires de la région.",
  },
  {
    id: 6,
    title: "Marché immobilier à Buckingham et Masson-Angers",
    body: "Le marché immobilier de Buckingham et Masson-Angers offre une grande diversité de propriétés adaptées à différents budgets et styles de vie. On y retrouve des maisons unifamiliales, des maisons de ville, des condominiums ainsi que des propriétés offrant davantage d’espace et de tranquillité. Grâce à leur accessibilité et à leur environnement familial, ces secteurs demeurent particulièrement recherchés par les acheteurs souhaitant profiter d’un excellent rapport qualité-prix dans la région de Gatineau.",
  },
  {
    id: 7,
    title: "Une qualité de vie équilibrée dans l’est de Gatineau",
    body: "Buckingham et Masson-Angers offrent un environnement où nature, communauté et accessibilité se rencontrent harmonieusement. Avec leurs nombreux services, leurs activités extérieures et leur ambiance conviviale, ces secteurs représentent un excellent choix pour ceux qui recherchent un mode de vie paisible sans s’éloigner des commodités urbaines.",
  },
  {
    id: 8,
    title: "Un accompagnement immobilier professionnel",
    body: "Que vous souhaitiez acheter, vendre ou investir à Buckingham ou Masson-Angers, Nicolas Léveillé s’engage à offrir un accompagnement personnalisé, des conseils stratégiques et un service professionnel à chaque étape de votre projet immobilier.",
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
                    L’Expérience Nicolas Léveillé: Qui est Nicolas Léveillé?
                </p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif max-w-4xl mx-auto animate-slide-up">
                   Courtier immobilier résidentiel | Secteur Buckingham & Masson-Angers
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