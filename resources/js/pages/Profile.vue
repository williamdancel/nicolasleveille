<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import ContactForm from '@/components/ContactForm/ContactForm.vue'
</script>

<template>
  <Head title="Profil" />

  <div class="min-h-screen bg-[#f3f3f3] text-black overflow-hidden">

    <!-- Hero Section  -->
    <section class="bg-gray-900 text-white py-32 text-center relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#ac8c4c] rounded-full filter blur-3xl animate-pulse-slow animation-delay-1000"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h1 class="text-5xl md:text-6xl font-serif animate-slide-up">PROFIL</h1>
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
                class="w-[320px] md:w-[360px] object-cover"
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
              <div class="w-[4px] h-12 bg-[#c89a56]"></div>

              <p class="text-2xl font-light">
                Avec Léveillé, c'est acheté
              </p>
            </div>

            <!-- CONTENT -->
            <div class="max-w-2xl">
              <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 leading-tight">
                Faites partie de notre succès
              </h2>

              <p class="text-xl leading-relaxed text-gray-800 mb-10">
                Partagez avec nous une approche moderne,
                ambitieuse et fortement orientée résultats
                pour le marché immobilier de l'Outaouais.
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
            <p class="text-3xl leading-relaxed font-light max-w-2xl">
              Vos besoins, votre échéancier, votre
              maison. Un service entièrement
              adapté à vous.
            </p>
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
              Contact
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

          <!-- BUSINESS HOURS -->
          <div>
            <h3 class="text-4xl uppercase tracking-wide font-light mb-8">
              Business Hours
            </h3>

            <div class="space-y-3 text-xl">
              <p class="font-black">7 days a week</p>
              <p class="font-black">8:00H - 20:00H</p>
            </div>
          </div>

          <!-- FREE EVALUATION-->
          <div>
            <Link 
              href="/free-evaluation" 
              class="bg-[#b0884c] text-white px-8 py-4 rounded-lg hover:bg-[#96733f] transition-colors duration-200 font-black text-5xl md:text-6xl leading-none mb-4 inline-block"
            >
              Free evaluation
            </Link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>