<?php include __DIR__ . "/includes/_header.php"; ?>

<style>
  /* small animations */
  .fade-in {
    opacity: 0;
    animation: fadeIn 1s ease-out forwards;
  }

  @keyframes fadeIn {
    to {
      opacity: 1;
    }
  }

  .slide-up {
    opacity: 0;
    transform: translateY(20px);
    animation: slideUp 0.9s ease-out forwards;
  }

  @keyframes slideUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<div class="pt-20 min-h-screen fade-in">

  <!-- HERO -->
  <section class="py-20 slide-up">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <!-- LOGO BUKU: Dikurangi jadi 250px (setengah dari 500px) -->
      <div class="flex justify-center items-center mb-10">
        <svg style="width: 250px; height: 250px; max-width: 100%;" class="text-light opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.0"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
      </div>
      <h1 class="text-6xl font-bold text-light mb-4">GEMPA BUMI</h1>
      <p class="text-2xl text-light opacity-90">Panduan Lengkap, Visual, dan Mudah Dipahami</p>
    </div>
  </section>

  <div class="max-w-7xl mx-auto px-6 py-16">

    <!-- ========================================================= -->
    <!-- TIPE GEMPA                                                 -->
    <!-- ========================================================= -->
    <section class="grid md:grid-cols-2 gap-10 mb-24" id="tipegempa">

      <!-- Tektonik -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-secondary hover:-translate-y-2 transition-all duration-300 slide-up">
        <!-- Container ikon -->
        <div class="bg-gradient-to-br from-secondary to-primary py-16 flex items-center justify-center">
          <!-- LOGO PETIR: Dikurangi jadi 200px (setengah dari 400px) -->
          <svg style="width: 200px; height: 200px; max-width: 80%;" class="text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
              d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <div class="p-8">
          <h3 class="text-4xl font-bold text-primary mb-4">Gempa Tektonik</h3>
          <p class="text-gray-700 leading-relaxed text-lg mb-4">
            Gempa ini terjadi karena pergerakan lempeng bumi. Indonesia berada di area pertemuan tiga lempeng besar sehingga jenis ini paling sering terjadi dan berpotensi kuat.
          </p>
          <ul class="space-y-2 text-gray-700">
            <li>• Terjadi di zona subduksi dan sesar aktif.</li>
            <li>• Bisa mencapai magnitudo sangat besar.</li>
            <li>• Dapat menimbulkan tsunami.</li>
            <li>• Contoh: Gempa Aceh 2004, Gempa Palu 2018.</li>
          </ul>
        </div>
      </div>

      <!-- Vulkanik -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-accent hover:-translate-y-2 transition-all duration-300 slide-up">
        <!-- Container ikon -->
        <div class="bg-gradient-to-br from-accent to-secondary py-16 flex items-center justify-center">
          <!-- LOGO GUNUNG: Dikurangi jadi 200px (setengah dari 400px) -->
          <svg style="width: 200px; height: 200px; max-width: 80%;" class="text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div class="p-8">
          <h3 class="text-4xl font-bold text-primary mb-4">Gempa Vulkanik</h3>
          <p class="text-gray-700 leading-relaxed text-lg mb-4">
            Jenis gempa yang berkaitan dengan aktivitas gunung berapi—pergerakan magma dan tekanan gas. Biasanya magnitudonya kecil namun sangat penting untuk pemantauan erupsi.
          </p>
          <ul class="space-y-2 text-gray-700">
            <li>• Indikator aktivitas gunung.</li>
            <li>• Terjadi sebelum dan selama erupsi.</li>
            <li>• Sering terjadi berulang (gempa swam).</li>
            <li>• Contoh: Gunung Merapi, Semeru, Sinabung.</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ========================================================= -->
    <!-- BAGAN LANGKAH DARURAT                                     -->
    <!-- ========================================================= -->
    <section class="mb-24 slide-up">
      <h2 class="text-5xl font-bold text-primary text-center mb-12">Bagan Langkah Darurat</h2>

      <div class="grid md:grid-cols-3 gap-10 text-center">

        <div class="p-8 bg-white border-4 border-accent rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-300">
          <h3 class="text-3xl font-bold text-primary mb-3">1. Sebelum</h3>
          <p class="text-gray-700 leading-relaxed">
            Siapkan tas siaga, cek struktur bangunan, dan pastikan keluarga tahu titik aman.
          </p>
        </div>

        <div class="p-8 bg-white border-4 border-primary rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-300">
          <h3 class="text-3xl font-bold text-primary mb-3">2. Saat Terjadi</h3>
          <p class="text-gray-700 leading-relaxed">
            Lakukan *drop, cover, and hold on* untuk melindungi diri dari reruntuhan.
          </p>
        </div>

        <div class="p-8 bg-white border-4 border-secondary rounded-3xl shadow-xl hover:-translate-y-2 transition-all duration-300">
          <h3 class="text-3xl font-bold text-primary mb-3">3. Sesudah</h3>
          <p class="text-gray-700 leading-relaxed">
            Evakuasi ke area aman, hindari bangunan retak, dan ikuti informasi resmi.
          </p>
        </div>

      </div>
    </section>

    <!-- ========================================================= -->
    <!-- MITIGASI GEMPA                                             -->
    <!-- ========================================================= -->
    <section class="mb-24 slide-up" id="mitigasi">
      <h2 class="text-5xl font-bold text-center text-primary mb-4">Mitigasi Bencana</h2>
      <p class="text-center text-gray-600 text-lg mb-12">Persiapan & tindakan untuk mengurangi risiko</p>

      <div class="grid md:grid-cols-3 gap-10">

        <div class="rounded-3xl p-8 text-center shadow-2xl border-4 border-accent bg-white hover:-translate-y-2 transition-all">
          <h3 class="text-3xl font-bold text-primary mb-3">Sebelum</h3>
          <p class="text-gray-700">
            Latihan evakuasi, perkuat bangunan, simpan barang berat di bawah, dan siapkan tas siaga.
          </p>
        </div>

        <div class="rounded-3xl p-8 text-center shadow-2xl border-4 border-primary bg-white hover:-translate-y-2 transition-all">
          <h3 class="text-3xl font-bold text-primary mb-3">Saat Terjadi</h3>
          <p class="text-gray-700">
            Lindungi kepala, jauhi jendela, jangan gunakan lift, dan tetap tenang.
          </p>
        </div>

        <div class="rounded-3xl p-8 text-center shadow-2xl border-4 border-secondary bg-white hover:-translate-y-2 transition-all">
          <h3 class="text-3xl font-bold text-primary mb-3">Sesudah</h3>
          <p class="text-gray-700">
            Periksa luka, hindari bangunan rusak, dan bersiap menghadapi gempa susulan.
          </p>
        </div>

      </div>
    </section>

    <!-- ========================================================= -->
    <!-- FAQ GEMPA                                                  -->
    <!-- ========================================================= -->
    <section class="mb-24 slide-up">
      <h2 class="text-5xl font-bold text-primary mb-10 text-center">FAQ Gempa Bumi</h2>

      <div class="space-y-4">

        <details class="bg-white p-6 rounded-2xl shadow-lg border-2 border-accent">
          <summary class="cursor-pointer font-semibold text-primary text-xl">Apa penyebab gempa bumi?</summary>
          <p class="mt-4 text-gray-700 leading-relaxed">
            Gempa disebabkan oleh pelepasan energi akibat pergerakan lempeng tektonik atau aktivitas vulkanik.
          </p>
        </details>

        <details class="bg-white p-6 rounded-2xl shadow-lg border-2 border-primary">
          <summary class="cursor-pointer font-semibold text-primary text-xl">Apakah gempa bisa diprediksi?</summary>
          <p class="mt-4 text-gray-700">
            Tidak bisa diprediksi secara waktu pasti. Yang bisa dilakukan adalah memonitor aktivitasnya.
          </p>
        </details>

        <details class="bg-white p-6 rounded-2xl shadow-lg border-2 border-secondary">
          <summary class="cursor-pointer font-semibold text-primary text-xl">Apa itu gempa susulan?</summary>
          <p class="mt-4 text-gray-700">
            Guncangan setelah gempa utama karena penyesuaian kerak bumi.
          </p>
        </details>

        <details class="bg-white p-6 rounded-2xl shadow-lg border-2 border-accent">
          <summary class="cursor-pointer font-semibold text-primary text-xl">Bagaimana membedakan gempa tektonik dan vulkanik?</summary>
          <p class="mt-4 text-gray-700">
            Tektonik berasal dari pergerakan lempeng; vulkanik terkait magma dan tekanan dalam gunung berapi.
          </p>
        </details>
      </div>
    </section>

    <!-- ========================================================= -->
    <!-- SHELTER BUTTON                                             -->
    <!-- ========================================================= -->
    <section class="rounded-3xl overflow-hidden shadow-2xl slide-up">
      <div class="grid lg:grid-cols-2 gap-8 items-center p-12">
        <div class="bg-accent bg-opacity-20 backdrop-blur-sm h-96 rounded-2xl flex items-center justify-center border-4 border-light">
          <svg class="w-40 h-40 text-light" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div class="text-light">
          <h2 class="text-5xl font-bold mb-6">Lokasi Penampungan Darurat</h2>
          <p class="text-xl opacity-90 leading-relaxed mb-8">
            Temukan titik penampungan terdekat untuk evakuasi aman ketika terjadi gempa.
          </p>
          <a href="map.php"
            class="mt-6 inline-block px-6 py-3 text-white font-semibold rounded-lg bg-gradient-to-b from-[#59BA6A] to-[#285430] hover:opacity-90 transition">
            Lihat Peta Lokasi
          </a>
        </div>
      </div>
    </section>

  </div>
</div>

<?php include __DIR__ . "/includes/_footer.php"; ?>
