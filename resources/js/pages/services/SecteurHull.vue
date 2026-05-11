<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue'

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec professionnalisme, intégrité et rigueur dans tous leurs projets immobiliers dans la région de Gatineau–Ottawa. Courtier immobilier affilié à Keller Williams Distinction, il privilégie une approche personnalisée axée sur l’écoute, la transparence et les résultats."

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Vivre dans le secteur Hull",
    body: "Situé au cœur de Gatineau et bordé par la rivière des Outaouais, Hull est un secteur dynamique reconnu pour son ambiance urbaine, son riche patrimoine culturel et sa proximité avec le centre-ville d’Ottawa. Hull séduit par son équilibre entre vie citadine et accès à la nature. Le secteur offre un environnement animé où se côtoient espaces verts, attractions culturelles, restaurants branchés et infrastructures modernes. Sa localisation stratégique en fait un choix recherché autant par les jeunes professionnels que par les familles et les investisseurs immobiliers.",
  },
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Le secteur Hull bénéficie d’une offre complète de commodités et de services essentiels. Les résidents profitent d’un accès rapide à des centres commerciaux, épiceries, pharmacies, institutions financières, cafés et commerces locaux qui facilitent le quotidien. Hull propose également plusieurs infrastructures communautaires et récréatives, incluant des bibliothèques, centres sportifs et espaces culturels. Grâce à sa proximité avec le centre-ville de Gatineau et Ottawa, le secteur offre un accès privilégié à une vaste gamme de services supplémentaires et d’options de divertissement.",
  },
  {
    id: 3,
    title: "Une destination culinaire incontournable",
    body: "Le secteur Hull est reconnu pour sa scène gastronomique dynamique et diversifiée. Restaurants raffinés, cafés indépendants, bistros modernes et microbrasseries contribuent à créer une ambiance urbaine vivante et conviviale. Les résidents et visiteurs peuvent y découvrir une grande variété de cuisines locales et internationales, ainsi qu’une offre culinaire en constante évolution. Les nombreuses terrasses et adresses branchées du secteur en font un lieu prisé pour les sorties entre amis, les repas d’affaires et les expériences gastronomiques.",
  },
  {
    id: 4,
    title: "Accès aux soins de santé",
    body: "Les résidents du secteur Hull bénéficient d’un accès à plusieurs établissements de santé et services médicaux de qualité dans la région de Gatineau–Ottawa. Cliniques médicales, pharmacies et centres spécialisés assurent des services accessibles et adaptés aux besoins de la population. La proximité des principaux établissements hospitaliers de la région contribue également à la qualité de vie et à la tranquillité d’esprit des résidents du secteur." 
  },
  {
    id: 5,
    title: "Activités, culture et espaces verts",
    body: "Hull offre une multitude d’activités culturelles, récréatives et de plein air accessibles tout au long de l’année. Le secteur est notamment reconnu pour ses magnifiques espaces verts, dont le Parc Jacques-Cartier, qui accueille plusieurs événements et festivals majeurs dans la région. Le bord de la rivière des Outaouais permet également de profiter d’activités telles que le vélo, la marche, le kayak et d’autres loisirs extérieurs dans un environnement naturel exceptionnel. Les amateurs de culture apprécient aussi la proximité du Musée canadien de l’histoire, l’un des lieux culturels emblématiques de la région."
  },
  {
    id: 6,
    title: "Le marché immobilier dans le secteur Hull",
    body: "Le marché immobilier du secteur Hull se distingue par sa diversité et son fort potentiel. On y retrouve une variété de propriétés, incluant des condominiums modernes, des maisons en rangée, des immeubles à revenus et des résidences unifamiliales adaptées à différents styles de vie. Grâce à son emplacement stratégique, son dynamisme urbain et sa proximité avec Ottawa, Hull demeure un secteur très recherché dans la région de l’Outaouais. Le marché attire autant les premiers acheteurs que les investisseurs à la recherche d’opportunités intéressantes dans un environnement en pleine croissance."
  },
  {
    id: 7,
    title: "Un accompagnement immobilier professionnel",
    body: "Que vous souhaitiez acheter, vendre ou investir dans le secteur Hull, Nicolas Léveillé s’engage à offrir un accompagnement personnalisé, des conseils stratégiques et un service professionnel à chaque étape de votre transaction immobilière. Grâce à son approche rigoureuse et à son souci du détail, il veille à ce que chaque client bénéficie d’une expérience immobilière à la hauteur de ses attentes."
  }
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
                    Courtier immobilier agréé | Secteur Hull
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