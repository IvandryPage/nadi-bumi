<?php include __DIR__ . "/includes/_header.php"; ?>

<div class="pt-20 min-h-screen">

  <!-- Hero Banner -->
  <section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <svg class="w-32 h-32 text-light mx-auto mb-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
      </svg>
      <h1 class="text-6xl font-bold text-light mb-6">GEMPA BUMI</h1>
      <p class="text-2xl text-light opacity-90">Panduan Lengkap dan Informasi Penting</p>
    </div>
  </section>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <!-- Types Section -->
    <section class="grid md:grid-cols-2 gap-8 mb-20">
      <!-- Tektonik -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition-all duration-300 border-4 border-secondary">
        <div class="bg-gradient-to-br from-secondary to-primary h-64 flex items-center justify-center">
          <svg class="w-32 h-32 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <div class="p-8">
          <h3 class="text-4xl font-bold text-primary mb-4">Gempa Tektonik</h3>
          <p class="text-gray-700 leading-relaxed text-lg mb-4">
            Gempa yang disebabkan oleh pergerakan lempeng tektonik bumi. Jenis ini paling sering terjadi dan bisa memiliki kekuatan yang sangat besar.
          </p>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Terjadi di zona subduksi atau patahan aktif</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Dapat mencapai magnitudo di atas 8.0 SR</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Berpotensi menimbulkan tsunami</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Vulkanik -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition-all duration-300 border-4 border-secondary">
        <div class="bg-gradient-to-br from-accent to-secondary h-64 flex items-center justify-center">
          <svg class="w-32 h-32 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div class="p-8">
          <h3 class="text-4xl font-bold text-primary mb-4">Gempa Vulkanik</h3>
          <p class="text-gray-700 leading-relaxed text-lg mb-4">
            Gempa yang terjadi akibat aktivitas gunung berapi. Biasanya terjadi di sekitar area vulkanik dan menjadi indikator potensi erupsi.
          </p>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Disebabkan oleh pergerakan magma</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Magnitudo umumnya lebih kecil (< 5.0 SR)</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-secondary font-bold">•</span>
              <span>Indikator aktivitas gunung berapi</span>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Mitigation Section -->
    <section class="mb-20">
      <h2 class="text-5xl font-bold text-center text-primary mb-4">Mitigasi Bencana</h2>
      <p class="text-center text-gray-600 text-lg mb-12">Langkah-langkah pencegahan dan pengurangan risiko</p>
      <div class="grid md:grid-cols-3 gap-8">
        <!-- Sebelum -->
        <div class="rounded-3xl p-8 text-center shadow-2xl hover:-translate-y-2 transition-all duration-300 border-4 border-accent group">
          <div class="bg-white bg-opacity-20 rounded-full w-32 h-32 mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
            <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-3xl font-bold text-light mb-4">Sebelum</h3>
          <p class="text-light opacity-90 leading-relaxed">Persiapan dan perencanaan untuk menghadapi gempa</p>
        </div>

        <!-- Saat -->
        <div class="rounded-3xl p-8 text-center shadow-2xl hover:-translate-y-2 transition-all duration-300 border-4 border-primary group">
          <div class="bg-white bg-opacity-20 rounded-full w-32 h-32 mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
            <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <h3 class="text-3xl font-bold text-light mb-4">Saat Terjadi</h3>
          <p class="text-light opacity-90 leading-relaxed">Tindakan cepat dan tepat saat gempa berlangsung</p>
        </div>

        <!-- Sesudah -->
        <div class="rounded-3xl p-8 text-center shadow-2xl hover:-translate-y-2 transition-all duration-300 border-4 border-primary group">
          <div class="bg-white bg-opacity-20 rounded-full w-32 h-32 mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
            <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
          </div>
          <h3 class="text-3xl font-bold text-light mb-4">Sesudah</h3>
          <p class="text-light opacity-90 leading-relaxed">Pemulihan dan evaluasi pasca gempa</p>
        </div>
      </div>
    </section>

    <!-- Response Guide Section -->
    <section class="mb-20">
      <h2 class="text-5xl font-bold text-primary mb-12">Panduan Penanggulangan</h2>
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
          <?php
          $steps = [
            ['num' => 1, 'text' => 'Tetap tenang dan jangan panik. Ambil napas dalam-dalam untuk menjaga ketenangan.'],
            ['num' => 2, 'text' => 'Berlindung di bawah meja yang kokoh atau di sudut ruangan yang aman.'],
            ['num' => 3, 'text' => 'Jauhi jendela, cermin, dan benda-benda yang bisa jatuh dan menimpa.'],
            ['num' => 4, 'text' => 'Lindungi kepala dan leher dengan tangan atau bantal untuk menghindari cedera.'],
            ['num' => 5, 'text' => 'Keluar ruangan dengan hati-hati setelah guncangan berhenti sepenuhnya.'],
            ['num' => 6, 'text' => 'Menuju ke area terbuka yang aman dan jauh dari bangunan tinggi.']
          ];

          foreach ($steps as $step):
          ?>
            <div class="flex gap-4 items-start bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-accent">
              <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                <span class="text-light font-bold text-2xl"><?= $step['num'] ?></span>
              </div>
              <p class="text-gray-700 leading-relaxed pt-3 text-lg"><?= $step['text'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="h-full min-h-[600px] rounded-3xl shadow-2xl flex items-center justify-center border-4 border-primary">
          <svg class="w-48 h-48 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
      </div>

      <!-- Carousel Indicators -->
      <div class="flex justify-center gap-3 mt-8">
        <?php for ($i = 0; $i < 8; $i++): ?>
          <button class="<?= $i === 0 ? 'w-8 bg-primary' : 'w-3 bg-gray-300' ?> h-3 rounded-full transition-all duration-300 hover:bg-secondary"></button>
        <?php endfor; ?>
      </div>
    </section>

    <!-- Shelter Location Section -->
    <section class="rounded-3xl overflow-hidden shadow-2xl">
      <div class="grid lg:grid-cols-2 gap-8 items-center p-12">
        <div class="bg-accent bg-opacity-20 backdrop-blur-sm h-96 rounded-2xl flex items-center justify-center border-4 border-light border-opacity-30">
          <svg class="w-40 h-40 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div class="text-light">
          <h2 class="text-5xl font-bold mb-6">Lokasi Penampungan Darurat</h2>
          <p class="text-xl opacity-90 leading-relaxed mb-8">
            Temukan titik-titik lokasi penampungan darurat terdekat di area Anda untuk keamanan maksimal saat terjadi bencana gempa bumi.
          </p>
          <button class="bg-accent text-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-light hover:scale-105 transition-all duration-300 shadow-xl">
            Lihat Peta Lokasi
          </button>
        </div>
      </div>
    </section>

    <!-- Emergency Kit Section -->
    <section class="mt-20 bg-white rounded-3xl p-12 shadow-2xl border-4 border-accent">
      <h2 class="text-5xl font-bold text-primary mb-8 text-center">Tas Siaga Bencana</h2>
      <p class="text-center text-gray-600 text-lg mb-12">Barang-barang penting yang harus disiapkan</p>
      <div class="grid md:grid-cols-4 gap-6">
        <?php
        $emergencyItems = [
          ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Obat-obatan', 'desc' => 'P3K & obat pribadi'],
          ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Makanan', 'desc' => 'Makanan kaleng & air'],
          ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'title' => 'Senter', 'desc' => 'Senter & baterai cadangan'],
          ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'title' => 'Komunikasi', 'desc' => 'Radio & power bank']
        ];

        foreach ($emergencyItems as $item):
        ?>
          <div class="bg-gradient-to-br from-light to-accent p-6 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
            <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
              <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $item['icon'] ?>" />
              </svg>
            </div>
            <h4 class="font-bold text-primary text-lg mb-2"><?= $item['title'] ?></h4>
            <p class="text-gray-600 text-sm"><?= $item['desc'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>
</div>

<?php include __DIR__ . "/includes/_footer.php"; ?>