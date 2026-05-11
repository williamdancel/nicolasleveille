<script setup lang="ts">
import CTASection from '@/components/CTA/CTASection.vue'

const firstBodyContent = "Nicolas Léveillé accompagne ses clients avec une approche professionnelle, humaine et stratégique dans la réalisation de leurs projets immobiliers dans la région de Gatineau–Ottawa. Affilié à Keller Williams Distinction, il se démarque par son écoute, sa rigueur et son engagement à offrir un service personnalisé adapté aux besoins de chaque client."

interface Content {
  id: number
  title: string
  body: string
}

const contents: Content[] = [
  {
    id: 1,
    title: "Vivre dans le secteur Aylmer",
    body: "Situé le long de la rivière des Outaouais, Aylmer est reconnu pour son charme unique, son ambiance conviviale et sa qualité de vie exceptionnelle. Ce secteur prisé de Gatineau séduit autant les familles que les professionnels grâce à son équilibre entre nature, tranquillité et proximité des services urbains.Avec ses rues paisibles, ses espaces verts, ses écoles, ses commerces locaux et son accès rapide au centre-ville d’Ottawa, Aylmer représente un milieu de vie recherché où il fait bon s’établir.",
  },
  {
    id: 2,
    title: "Commodités et services de proximité",
    body: "Le secteur d’Aylmer offre une multitude de commodités et de services facilitant le quotidien de ses résidents. On y retrouve des centres commerciaux, des épiceries, des pharmacies, des institutions financières, des cafés ainsi qu’une grande variété de commerces de proximité.Le secteur dispose également de plusieurs infrastructures communautaires et sportives, notamment des bibliothèques, des centres récréatifs et des installations sportives adaptées à tous les âges. Sa proximité avec les principaux axes routiers permet aussi un accès rapide aux différents secteurs de Gatineau et à la ville d’Ottawa.",
  },
  {
    id: 3,
    title: "Une scène gastronomique diversifiée",
    body: "Aylmer propose une offre culinaire variée qui contribue à son ambiance chaleureuse et dynamique. Restaurants raffinés, cafés indépendants, bistros et adresses locales permettent aux résidents de profiter d’expériences gastronomiques adaptées à tous les goûts.Que ce soit pour une sortie décontractée, un brunch entre amis ou un souper plus sophistiqué, le secteur offre une belle diversité de saveurs locales et internationales dans un environnement accueillant.",
  },
  {
    id: 4,
    title: "Accès aux soins de santé",
    body: "Les résidents d’Aylmer bénéficient d’un accès à plusieurs établissements de santé et services médicaux de qualité dans la région de Gatineau–Ottawa. Cliniques médicales, pharmacies et centres spécialisés contribuent au bien-être et à la tranquillité d’esprit des familles et des professionnels qui choisissent de s’établir dans le secteur. La proximité avec Ottawa permet également un accès élargi à divers services de santé spécialisés.",
  },
  {
    id: 5,
    title: "Activités de plein air et espaces verts",
    body: "Le secteur Aylmer est particulièrement apprécié pour son environnement naturel et ses nombreuses activités extérieures. Bordé par la rivière des Outaouais et situé à proximité du Parc de la Gatineau, le secteur offre un accès privilégié à une multitude d’activités récréatives tout au long de l’année.Les résidents peuvent profiter de sentiers pédestres, de pistes cyclables, de parcs urbains et d’espaces verts parfaits pour les activités familiales, le sport et la détente. Les amateurs de plein air apprécient également les activités nautiques, la randonnée, le vélo ainsi que les sports d’hiver accessibles à proximité."
  },
  {
    id: 6,
    title: "Le marché immobilier à Aylmer",
    body: "Le marché immobilier d’Aylmer se distingue par sa diversité et son attrait grandissant auprès des acheteurs et investisseurs. Le secteur propose un vaste choix de propriétés, allant des condominiums modernes aux maisons unifamiliales et propriétés haut de gamme.Grâce à son environnement paisible, sa proximité avec Ottawa et sa qualité de vie recherchée, Aylmer demeure l’un des secteurs les plus convoités de la région de Gatineau. Le marché immobilier y offre d’excellentes opportunités pour les premiers acheteurs, les familles et les investisseurs souhaitant s’établir dans un secteur dynamique et en forte demande."
  },
  {
    id: 7,
    title: "Un accompagnement immobilier à votre image",
    body: "Que vous souhaitiez acheter, vendre ou investir dans le secteur d’Aylmer, Nicolas Léveillé met son expertise, sa rigueur et son professionnalisme à votre service afin de vous accompagner à chaque étape de votre projet immobilier. Son approche personnalisée et son souci du détail permettent à ses clients de bénéficier d’un accompagnement adapté à leurs objectifs et à leurs besoins."
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
                    Courtier immobilier agréé | Secteur Aylmer
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