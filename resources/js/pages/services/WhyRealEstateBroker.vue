<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Vendre ou acheter une propriété représente une étape importante qui comporte plusieurs décisions, démarches et enjeux financiers. Que ce soit pour une première propriété, un investissement ou la vente d’une résidence familiale, être accompagné par un courtier immobilier expérimenté peut faire toute la différence. Un service de courtage immobilier professionnel permet non seulement de simplifier le processus, mais également d’assurer un accompagnement stratégique à chaque étape de la transaction."

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Une expertise du marché immobilier",
    body: "L’un des principaux avantages de travailler avec un courtier immobilier est de bénéficier d’une excellente connaissance du marché local. Grâce à son expertise, le courtier est en mesure d’analyser les tendances du marché, les valeurs comparables, les conditions actuelles ainsi que les particularités des différents secteurs. Pour les vendeurs, cela permet de positionner la propriété au juste prix afin de maximiser sa visibilité et son potentiel de vente. Pour les acheteurs, cette expertise aide à identifier les meilleures opportunités selon leurs besoins et leur budget.",
  },
  {
    id: 2,
    title: "Un accès à un vaste réseau immobilier",
    body: "Les courtiers immobiliers possèdent un réseau professionnel étendu comprenant d’autres courtiers, professionnels du financement, inspecteurs, notaires et spécialistes du domaine immobilier. Cet accès privilégié permet de faciliter plusieurs étapes importantes du processus. Pour les acheteurs, cela signifie davantage d’opportunités et un accès rapide aux nouvelles inscriptions sur le marché. Pour les vendeurs, cela permet d’offrir une visibilité accrue à leur propriété auprès d’acheteurs potentiels qualifiés.",
  },
  {
    id: 3,
    title: "Des stratégies de mise en marché efficaces",
    body: "La vente d’une propriété nécessite aujourd’hui une stratégie de marketing bien structurée. Un courtier immobilier professionnel sait comment mettre une propriété en valeur afin d’attirer l’attention des acheteurs ciblés. Photographies professionnelles, visibilité en ligne, campagnes publicitaires, visites virtuelles et diffusion sur les plateformes immobilières font partie des outils utilisés pour maximiser l’exposition d’une propriété sur le marché. Une présentation soignée et une mise en marché efficace peuvent contribuer à vendre plus rapidement et dans les meilleures conditions possibles.",
  },
  {
    id: 4,
    title: "Un accompagnement dans les négociations",
    body: "Les négociations jouent un rôle essentiel dans toute transaction immobilière. Le courtier agit comme intermédiaire afin de défendre les intérêts de son client et de négocier les meilleures conditions possibles. Grâce à son expérience, il peut guider ses clients dans l’analyse des offres, la gestion des contre-offres ainsi que les différentes clauses contractuelles. Cet accompagnement permet de sécuriser la transaction tout en réduisant les risques d’erreurs ou de mauvaises décisions.",
  },
  {
    id: 5,
    title: "Un processus simplifié et moins stressant",
    body: "Une transaction immobilière implique de nombreuses étapes administratives, légales et organisationnelles. Le courtier immobilier coordonne l’ensemble du processus, incluant les visites, les documents, les suivis avec les différents intervenants et le respect des échéanciers. Cet encadrement professionnel permet aux clients de vivre une expérience beaucoup plus simple, structurée et rassurante.",
  },
  {
    id: 6,
    title: "Des conseils adaptés à chaque situation",
    body: "Chaque projet immobilier est unique. Que ce soit pour acheter, vendre, investir ou relocaliser, un courtier immobilier peut offrir des conseils personnalisés selon les objectifs et la réalité de chaque client. Grâce à sa connaissance du marché et à son approche stratégique, Nicolas Léveillé accompagne ses clients avec professionnalisme afin de les aider à prendre des décisions réfléchies et avantageuses.",
  },
  {
    id: 7,
    title: "Conclusion",
    body: "Faire appel à un courtier immobilier représente un avantage important lors de la vente ou de l’achat d’une propriété. Grâce à son expertise, son réseau professionnel et son accompagnement personnalisé, le courtier facilite chaque étape du processus tout en protégeant les intérêts de ses clients. Avec son approche humaine, sa rigueur professionnelle et sa connaissance approfondie du marché immobilier de l’Outaouais, Nicolas Léveillé s’engage à offrir un service de qualité supérieure et une expérience immobilière à la hauteur des attentes de ses clients.",
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
                   Un service de courtier immobilier pour vendre ou acheter une propriété
                </h1>
                <br>
                <p>Titulaire d’un BAA et d’un titre professionnel CPA, Nicolas Léveillé offre une approche professionnelle, stratégique et personnalisée dans le domaine de l’immobilier résidentiel. Courtier immobilier résidentiel chez Keller Williams, il accompagne ses clients avec rigueur, transparence et engagement à chaque étape de leur transaction immobilière.</p>
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