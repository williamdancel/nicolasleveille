<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, rigueur et transparence dans leurs projets immobiliers à travers la région de l’Outaouais. Affilié à Keller Williams Distinction, il mise sur une approche personnalisée et stratégique afin d’offrir un accompagnement adapté aux besoins de chaque client."

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Découvrir la région du Pontiac",
    body: "Située dans l’ouest du Québec, la région du Pontiac séduit par ses paysages naturels, ses communautés accueillantes et son mode de vie paisible. Composée de municipalités telles que Fort-Coulonge, Campbell’s Bay, Luskville, Shawville, Bristol et Quyon, la région offre un environnement idéal pour les familles, les amateurs de plein air et les acheteurs à la recherche de tranquillité. Grâce à ses espaces verts, ses accès à la rivière des Outaouais et sa proximité avec Gatineau et Ottawa, le Pontiac offre un équilibre remarquable entre nature et accessibilité.",
  },
  {
    id: 2,
    title: "Fort-Coulonge",
    body: "Fort-Coulonge est une municipalité reconnue pour son patrimoine historique et son environnement naturel. Située le long de la rivière des Outaouais, elle propose plusieurs commerces de proximité, restaurants et services essentiels contribuant à la qualité de vie des résidents. La région attire également les amateurs de plein air grâce à ses sentiers, ses paysages forestiers et ses activités récréatives accessibles toute l’année.",
  },
  {
    id: 3,
    title: "Marché immobilier à Fort-Coulonge",
    body: "Le marché immobilier de Fort-Coulonge propose des propriétés accessibles, incluant des maisons unifamiliales, des terrains et des résidences rurales offrant un excellent rapport qualité-prix.",
  },
  {
    id: 4,
    title: "Campbell’s Bay",
    body: "Campbell's Bay offre un environnement paisible bordé par la rivière des Outaouais. Reconnue pour son ambiance conviviale et son accès aux activités nautiques, la municipalité attire les résidents à la recherche d’un style de vie calme et connecté à la nature. Le secteur propose également plusieurs espaces verts, installations communautaires et activités locales favorisant un fort sentiment d’appartenance.",
  },
  {
    id: 5,
    title: "Marché immobilier à Campbell’s Bay",
    body: "Le marché immobilier de Campbell’s Bay comprend des propriétés riveraines, maisons rurales et résidences familiales adaptées à différents styles de vie et budgets. Luskville est particulièrement apprécié pour ses panoramas naturels et sa proximité avec les collines de la Gatineau. Le secteur attire les amateurs de plein air grâce à ses sentiers, ses espaces boisés et ses paysages exceptionnels.La région offre un environnement paisible idéal pour ceux qui recherchent davantage d’espace et un contact privilégié avec la nature.",
  },
  {
    id: 6,
    title: "Marché immobilier à Luskville",
    body: "Le marché immobilier de Luskville propose des propriétés variées, incluant des maisons unifamiliales, des terrains et des résidences situées sur de plus grands lots.",
  },
  {
    id: 7,
    title: "Shawville",
    body: "Shawville est une municipalité dynamique reconnue pour son esprit communautaire et ses nombreux services de proximité. Le secteur offre plusieurs commerces, restaurants, installations sportives et événements locaux qui contribuent à son ambiance conviviale. La région bénéficie également de la présence de services de santé importants pour les résidents du Pontiac.",
  },
  {
    id: 8,
    title: "Bristol",
    body: "Bristol se distingue par son environnement naturel, ses lacs et ses paysages paisibles. Le secteur est particulièrement recherché par les amateurs de plein air et les acheteurs à la recherche d’un mode de vie plus tranquille. La proximité des plans d’eau, des sentiers et des espaces récréatifs contribue fortement à la qualité de vie des résidents. Marché immobilier à Bristol Le marché immobilier de Bristol comprend plusieurs propriétés riveraines, chalets et maisons unifamiliales offrant un cadre de vie naturel et reposant.",
  },
  {
    id: 9,
    title: "Quyon",
    body: "Quyon est une charmante communauté située près de la rivière des Outaouais. Reconnue pour son atmosphère chaleureuse et son rythme de vie paisible, Quyon attire les acheteurs à la recherche d’un environnement familial et naturel. Le secteur permet également un accès facile à plusieurs activités extérieures, incluant la randonnée, le vélo et les activités saisonnières. Marché immobilier à Quyon Le marché immobilier de Quyon offre une variété de propriétés, allant des maisons familiales aux propriétés rurales dans un environnement calme et accessible.",
  },
  {
    id: 10,
    title: "Une qualité de vie recherchée dans le Pontiac",
    body: "La région du Pontiac offre un mode de vie unique où nature, tranquillité et esprit communautaire se rencontrent. Que ce soit pour profiter des paysages de Luskville, du charme riverain de Quyon ou du dynamisme local de Shawville, chaque municipalité possède son caractère distinct et son attrait particulier. Avec son marché immobilier accessible et ses nombreux espaces naturels, le Pontiac représente une excellente option pour les familles, les retraités, les investisseurs et les acheteurs à la recherche d’un environnement équilibré et authentique. Un accompagnement immobilier professionnel Que vous souhaitiez acheter, vendre ou investir dans la région du Pontiac, Nicolas Léveillé s’engage à offrir un accompagnement personnalisé, des conseils stratégiques et un service professionnel à chaque étape de votre projet immobilier.",
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
                    Courtier immobilier agréé | Région de l’Outaouais et Pontiac
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