<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, transparence et dévouement dans la réalisation de leurs projets immobiliers dans la région de Gatineau–Ottawa. Courtier immobilier affilié à Keller Williams Distinction, il privilégie une approche humaine et stratégique axée sur les besoins réels de ses clients.";

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Vivre à Wakefield",
    body: "Situé au cœur des magnifiques collines de la Gatineau, Wakefield est un secteur reconnu pour son charme unique, son environnement naturel exceptionnel et son ambiance chaleureuse. Cette communauté prisée attire les amateurs de plein air, les familles ainsi que les professionnels à la recherche d’un équilibre entre tranquillité et proximité des grands centres urbains. Grâce à sa proximité avec Ottawa et le Parc de la Gatineau, Wakefield offre un mode de vie paisible tout en permettant un accès rapide aux services et commodités de la région de Gatineau–Ottawa.",
  },
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Wakefield propose une variété de services et de commerces répondant aux besoins quotidiens de ses résidents. On y retrouve des épiceries, cafés, pharmacies, commerces locaux et entreprises de proximité qui contribuent à l’ambiance conviviale du secteur. La communauté est également reconnue pour son dynamisme artistique et culturel. Plusieurs galeries, boutiques artisanales et commerces indépendants mettent en valeur le talent local et renforcent le caractère distinctif de Wakefield.Pour des besoins supplémentaires en matière de magasinage, de restauration ou de divertissement, les résidents bénéficient d’un accès facile à Gatineau et Ottawa.",
  },
  {
    id: 3,
    title: "Une destination culinaire recherchée",
    body: "Wakefield possède une scène gastronomique appréciée pour son authenticité et sa diversité. Le secteur accueille plusieurs restaurants, cafés, boulangeries artisanales et établissements mettant de l’avant des produits locaux et des expériences culinaires chaleureuses. Des bistros accueillants aux adresses gourmandes inspirées du terroir québécois, les résidents profitent d’une offre culinaire qui reflète parfaitement le caractère unique et convivial de la communauté.",
  },
  {
    id: 4,
    title: "Accès aux soins de santé",
    body: "Les résidents de Wakefield bénéficient d’un accès à des services de santé de qualité dans la région. Cliniques médicales, pharmacies et établissements de santé à proximité permettent aux familles et aux professionnels de profiter d’un environnement rassurant et bien desservi. La proximité de Gatineau et d’Ottawa permet également un accès élargi à plusieurs services médicaux spécialisés et infrastructures hospitalières importantes.",
  },
  {
    id: 5,
    title: "Activités de plein air et nature exceptionnelle",
    body: "Wakefield est un véritable paradis pour les amateurs de nature et d’activités extérieures. Situé à proximité du Parc de la Gatineau, le secteur offre un accès privilégié à des kilomètres de sentiers, de paysages naturels et d’activités récréatives accessibles toute l’année. Randonnée, vélo, ski de fond, kayak, paddleboard et observation de la nature font partie du quotidien des résidents qui choisissent de s’établir dans cette région reconnue pour sa beauté naturelle exceptionnelle. Wakefield offre un environnement paisible où il est possible de profiter pleinement d’un mode de vie actif et équilibré.",
  },
  {
    id: 6,
    title: "Le marché immobilier à Wakefield",
    body: "Le marché immobilier de Wakefield se distingue par son caractère unique et son intégration harmonieuse avec l’environnement naturel. Le secteur propose une variété de propriétés, allant des maisons champêtres et résidences contemporaines aux propriétés haut de gamme offrant des vues imprenables sur la nature environnante. Grâce à son attrait grandissant et à sa qualité de vie recherchée, Wakefield représente une option intéressante pour les acheteurs à la recherche d’un environnement paisible sans compromis sur l’accessibilité aux services et aux grands centres.",
  },
  {
    id: 7,
    title: "Un accompagnement immobilier de confiance",
    body: "Que vous souhaitiez acheter, vendre ou investir à Wakefield, Nicolas Léveillé s’engage à offrir un accompagnement personnalisé, des conseils stratégiques et une expérience immobilière professionnelle adaptée à vos objectifs. Son approche rigoureuse et son souci du détail permettent à ses clients d’avancer avec confiance dans chacune des étapes de leur transaction immobilière.",
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
                   L’Expérience Nicolas: Léveillé Qui est Nicolas Léveillé?
                </p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif max-w-4xl mx-auto animate-slide-up">
                    Courtier immobilier résidentiel | Secteur Wakefield
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