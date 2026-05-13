<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, rigueur et transparence dans leurs projets immobiliers dans la région de Gatineau–Ottawa. Affilié à Keller Williams Distinction, il privilégie une approche humaine et stratégique axée sur les besoins, les objectifs et la réalité de chaque client."

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Vivre à Chelsea",
    body: "Située au cœur de la magnifique région de l’Outaouais, Chelsea est une municipalité reconnue pour son environnement naturel exceptionnel, son style de vie raffiné et sa proximité avec la ville d’Ottawa. Entourée de forêts, de collines et d’espaces verts, Chelsea attire les familles, les professionnels et les amateurs de plein air à la recherche d’un équilibre entre tranquillité et accessibilité. Grâce à son ambiance chaleureuse, son dynamisme local et sa qualité de vie remarquable, Chelsea est devenue l’un des secteurs résidentiels les plus recherchés de la région.",
  },
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Chelsea offre à ses résidents un accès à plusieurs commodités et services essentiels facilitant le quotidien. On y retrouve des épiceries, cafés, pharmacies, boutiques locales, centres de bien-être et commerces de proximité dans un environnement convivial et paisible. La municipalité bénéficie également de sa proximité avec Gatineau et Ottawa, permettant un accès rapide à des centres commerciaux, services professionnels, établissements scolaires et infrastructures urbaines importantes.",
  },
  {
    id: 3,
    title: "Une scène gastronomique raffinée",
    body: "Chelsea est reconnue pour sa scène culinaire diversifiée et de grande qualité. Restaurants raffinés, cafés chaleureux, boulangeries artisanales et établissements locaux contribuent à créer une expérience gastronomique unique dans un décor naturel exceptionnel. Les résidents peuvent profiter d’une variété de saveurs inspirées de la cuisine locale et internationale, que ce soit pour un brunch décontracté, un souper élégant ou une sortie conviviale entre amis.",
  },
  {
    id: 4,
    title: "Bien-être et qualité de vie",
    body: "Le secteur Chelsea est particulièrement apprécié pour son ambiance apaisante et son approche axée sur le bien-être. La municipalité accueille plusieurs spas, centres de détente et espaces de ressourcement offrant des expériences axées sur la relaxation et l’équilibre de vie. L’environnement naturel, le calme du secteur et la proximité des espaces verts contribuent également à faire de Chelsea un endroit privilégié pour ceux qui recherchent un mode de vie sain et équilibré.",
  },
  {
    id: 5,
    title: "Activités de plein air et nature exceptionnelle",
    body: "Située à proximité du célèbre Parc de la Gatineau, Chelsea est un véritable paradis pour les amateurs de plein air. Le secteur offre un accès privilégié à une multitude d’activités accessibles tout au long de l’année. Randonnée, vélo, ski de fond, raquette, baignade et observation de la nature font partie du quotidien des résidents qui choisissent de vivre dans cet environnement exceptionnel. Les nombreux sentiers, lacs et points de vue panoramiques du parc contribuent à la renommée de Chelsea comme destination de choix pour les amoureux de la nature.",
  },
  {
    id: 6,
    title: "Le marché immobilier à Chelsea",
    body: "Le marché immobilier de Chelsea se distingue par ses propriétés élégantes, son environnement naturel recherché et son fort attrait résidentiel. Le secteur propose une variété de propriétés, incluant des maisons contemporaines, des résidences haut de gamme, des propriétés boisées et des demeures offrant une grande intimité. Grâce à sa qualité de vie exceptionnelle et à sa proximité avec Ottawa et Gatineau, Chelsea demeure l’un des marchés immobiliers les plus convoités de la région de l’Outaouais.",
  },
  {
    id: 7,
    title: "Une communauté recherchée dans l’Outaouais",
    body: "Chelsea offre un mode de vie unique où nature, tranquillité et raffinement se rencontrent harmonieusement. Entre ses paysages naturels, sa communauté dynamique, ses commerces locaux et ses nombreuses activités extérieures, la municipalité séduit ceux qui recherchent un environnement à la fois paisible et accessible.",
  },
  {
    id: 8,
    title: "Un accompagnement immobilier personnalisé",
    body: "Que vous souhaitiez acheter, vendre ou investir à Chelsea, Nicolas Léveillé s’engage à offrir un accompagnement professionnel, des conseils stratégiques et un service personnalisé à chaque étape de votre projet immobilier.",
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
                    Courtier immobilier résidentiel | Secteur Chelsea
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