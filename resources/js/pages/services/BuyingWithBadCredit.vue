<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue';

const firstBodyContent = "Avoir un dossier de crédit plus fragile peut sembler être un obstacle majeur lorsqu’il est question d’acheter une propriété. Pourtant, avec le bon accompagnement et une stratégie adaptée, devenir propriétaire demeure possible. Un courtier immobilier expérimenté peut jouer un rôle essentiel afin d’aider les acheteurs à mieux comprendre leurs options et à avancer avec confiance vers leur objectif."
interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Comprendre sa situation financière",
    body: "La première étape consiste à bien évaluer la situation de crédit de l’acheteur. Un courtier immobilier compétent peut orienter ses clients vers les bonnes ressources afin de mieux comprendre les éléments qui influencent leur capacité d’emprunt. Il peut également les conseiller sur certaines actions à entreprendre pour améliorer progressivement leur dossier financier et maximiser leurs chances d’obtenir un financement hypothécaire.",
  },
  {
    id: 2,
    title: "Accès à un réseau de professionnels",
    body: "Grâce à son réseau de contacts dans l’industrie, un courtier immobilier peut mettre ses clients en relation avec des spécialistes hypothécaires et des prêteurs habitués à travailler avec des situations financières plus complexes. Certaines institutions et solutions alternatives offrent des options adaptées aux acheteurs ayant un historique de crédit moins favorable. Cet accompagnement permet souvent de découvrir des solutions de financement auxquelles les acheteurs n’auraient pas pensé seuls.",
  },
  {
    id: 3,
    title: "Présenter un dossier solide aux prêteurs",
    body: "Même avec un crédit imparfait, plusieurs éléments peuvent renforcer un dossier d’achat : stabilité d’emploi, revenu constant, mise de fonds plus importante ou présence d’un coemprunteur. Le rôle du courtier est de mettre en valeur les forces du dossier afin de rassurer les prêteurs et augmenter les probabilités d’approbation. Une présentation stratégique et bien structurée peut faire toute la différence lors de l’analyse d’une demande de financement.",
  },
  {
    id: 4,
    title: "Accompagnement et négociation",
    body: "Un courtier immobilier agit également comme conseiller et négociateur tout au long du processus. Il peut défendre les intérêts de ses clients auprès des différents intervenants impliqués dans la transaction et les guider vers les meilleures options disponibles selon leur situation. Grâce à son expérience, il aide les acheteurs à éviter certaines erreurs coûteuses et à prendre des décisions réfléchies malgré les défis liés au crédit.",
  },
  {
    id: 5,
    title: "Des ressources adaptées aux premiers acheteurs",
    body: "Il existe plusieurs programmes et ressources pouvant soutenir les acheteurs ayant des contraintes financières ou un historique de crédit plus difficile. Certains programmes gouvernementaux ou initiatives d’aide à l’accession à la propriété peuvent offrir des solutions intéressantes selon le profil de l’acheteur. Un courtier immobilier bien informé peut aider à identifier ces opportunités et accompagner ses clients dans les démarches nécessaires.",
  },
  {
    id: 6,
    title: "Un accompagnement humain et rassurant",
    body: "Acheter une propriété peut devenir stressant lorsqu’on croit que son crédit représente un frein important. C’est pourquoi il est essentiel d’être accompagné par un professionnel à l’écoute, patient et engagé envers la réussite de ses clients. Nicolas Léveillé privilégie une approche humaine et transparente, où chaque client bénéficie d’un accompagnement personnalisé et de conseils adaptés à sa réalité financière.",
  },
  {
    id: 7,
    title: "Conclusion",
    body: "Un mauvais crédit ne signifie pas nécessairement la fin d’un projet immobilier. Avec les bons outils, les bonnes ressources et l’accompagnement d’un courtier immobilier qualifié, plusieurs solutions peuvent être envisagées afin de concrétiser un projet d’achat. Grâce à son expertise financière, son professionnalisme et son approche centrée sur les besoins de ses clients, Nicolas Léveillé accompagne les acheteurs avec confiance et rigueur afin de les aider à franchir chaque étape vers l’accession à la propriété.",
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
                    Acheter une maison avec un mauvais crédit : comment un courtier immobilier peut vous accompagner
                </h1>
                <br>
                <p>Titulaire d’un BAA et d’un titre professionnel CPA, Nicolas Léveillé apporte une approche rigoureuse, stratégique et humaine au domaine de l’immobilier résidentiel. Courtier immobilier agréé chez Keller Williams, il accompagne ses clients avec transparence, professionnalisme et dévouement dans chacune des étapes de leur projet immobilier.</p>
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