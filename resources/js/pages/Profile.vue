<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import ContactForm from '@/components/ContactForm/ContactForm.vue'
</script>

<template>
  <Head title="À propos de Nicolas" />

  <div class="min-h-screen bg-[#f3f3f3] text-black overflow-hidden">

    <!-- Hero Section  -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h1 class="text-5xl md:text-6xl font-serif animate-slide-up">À propos de Nicolas</h1>
        <div class="w-20 h-0.5 bg-[#ac8c4c] mx-auto mt-6 animate-scale"></div>
      </div>
    </section>
    <section class="border-b-[4px] border-black">
      <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

          <!-- LEFT SIDE -->
          <div>
            <!-- LOGOS -->
            <div class="flex items-center gap-6 mb-8">
              <img
                src="/images/nicolas-leveille-logo-removebg-preview.png"
                alt="Nicolas"
                class="h-16 object-contain"
              />

              <img
                src="/images/kw-distinction.png"
                alt="KW"
                class="h-12 object-contain"
              />
            </div>

            <!-- IMAGE -->
            <div class="border border-[#c89a56] p-1 inline-block bg-white">
              <img
                src="/images/nicolas-leveille.jpg"
                alt="Nicolas Léveillé"
                class="w-[320px] md:w-[515px] object-cover"
              />
            </div>
          </div>

          <!-- RIGHT SIDE -->
          <div>
            <h1 class="text-5xl md:text-6xl font-black leading-tight mb-3">
              Nicolas Léveillé
            </h1>

            <p class="uppercase tracking-[0.25em] text-sm mb-10">
              Courtier immobilier résidentiel
            </p>

            <!-- QUOTE -->
            <div class="flex items-center gap-5 mb-10">
              <div class="w-[4px] h-8 bg-[#c89a56]"></div>
              <p class="text-sm font-light">
                UN ACCOMPAGNEMENT STRATÉGIQUE ET HUMAIN.
              </p>
            </div>

            <!-- CONTENT -->
            <div class="max-w-2xl">
              <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 leading-tight">
                Qui est Nicolas Léveillé?
              </h2>

              <p class="text-xl leading-relaxed text-gray-800 mb-10">
                Je t'aide à vendre ou acheter une propriété avec une approche directe, structurée et axée sur les résultats. Chaque mandat mérite une stratégie claire, une exécution solide et une communication simple.
                <br><br>
                Avec KW comme agence, je mise sur un service moderne, une mise en marché forte et une négociation rigoureuse pour faire avancer ton projet immobilier avec confiance.
              </p>
            </div>

            <!-- CTA -->
            <!-- <Link
              href="/proprietes"
              class="inline-flex items-center gap-5 text-2xl border-b border-[#c89a56] pb-2 hover:opacity-70 transition"
            >
              Consultez mes biens

              <span class="text-[#c89a56] text-3xl">
                →
              </span>
            </Link> -->
          </div>
        </div>
      </div>
    </section>
    
    <!-- MIDDLE SECTION -->
    <section class="border-b-[4px] border-black">
      <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

          <!-- LEFT -->
          <div>
             <!-- QUOTE -->
            <div class="flex items-center gap-5 mb-5">
              <div class="w-[4px] h-8 bg-[#c89a56]"></div>
              <p class="text-sm font-light">
                POURQUOI TRAVAILLER AVEC MOI?
              </p>
            </div>
            <p class="text-3xl md:text-4xl font-black uppercase mb-6 leading-tight">
              Un service net, rapide et solide.
            </p>
            <p>
              Mon objectif est simple: rendre la transaction plus claire, mieux encadrée et plus performante. Du positionnement au closing, chaque étape est pensée pour protéger tes intérêts et maximiser le résultat.
            </p>
          </div>

          <!-- RIGHT -->
          <div class="lg:text-center">
              <div class="border border-[#c89a56] p-1 inline-block bg-white">
                <img
                  src="/images/nicolas-on-phone-service.jpg"
                  alt="Nicolas Léveillé On a Phone"
                  class="w-[320px] md:w-[515px] object-cover"
                />
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FORM SECTION -->
    <section class="border-b-[4px] border-black">
      <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

          <!-- LEFT -->
          <div>
            <p class="text-sm md:text-sm font-black mb-6 leading-tight">TU PEUX COMPTER SUR MOI POUR ÉLEVER LE NIVEAU.</p>
            <p class="text-3xl md:text-4xl font-black mb-6 leading-tight">Expérience locale</p>
            <p class="text-3xl md:text-4xl font-black mb-6 leading-tight">Service personnalisé</p>
            <p class="text-3xl md:text-4xl font-black mb-6 leading-tight">Résultats concrets</p>
            
          </div>

          <!-- RIGHT -->
          <div class="lg:text-center">
              <div class="bg-white rounded-2xl shadow-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">PARLER À NICOLAS</h3>
                <p class="text-gray-500 text-sm mb-6">Réponse sous 24h, garantie.</p>
                <ContactForm/>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BOTTOM SECTION -->
    <section>
      <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-3 gap-16">

          <!-- CONTACT -->
          <div>
            <h3 class="text-4xl uppercase tracking-wide font-light mb-8">
              Coordonnées
            </h3>

            <div class="space-y-8">
              <div class="flex items-start gap-4">
                <div class="text-2xl mt-1">☎</div>

                <div>
                  <p class="font-black tracking-[0.2em] text-lg">
                    819.664.2182
                  </p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="text-2xl mt-1">✉</div>

                <div>
                  <p class="font-black tracking-[0.12em] text-lg break-all">
                    nicolas.leveille@kw.com
                  </p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="text-2xl mt-1">⌖</div>

                <div>
                  <p class="font-black uppercase leading-relaxed text-lg">
                    KW DISTINCTION – Agence immobilière
                    <br />
                    259, boul. St-Joseph, bureau 104,
                    Gatineau (QC) J8Y 6T1
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- HEURES D'OUVERTURE -->
          <div>
            <h3 class="text-4xl uppercase tracking-wide font-light mb-8">
              Heures d'ouverture
            </h3>

            <div class="space-y-3 text-xl">
              <p class="font-black">7 jours par semaine</p>
              <p class="font-black">8:00H - 20:00H</p>
            </div>
          </div>

          <!-- ÉVALUATION GRATUITE -->
          <div>
            <Link 
              href="/evaluation-gratuite" 
              class="bg-[#b0884c] text-white px-8 py-4 rounded-lg hover:bg-[#96733f] transition-colors duration-200 font-black text-5xl md:text-6xl leading-none mb-4 inline-block"
            >
              Évaluation gratuite
            </Link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>