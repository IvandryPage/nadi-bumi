<?php include __DIR__ . "/includes/_header.php" ?>

<main class="pt-16">
  <!-- Hero Section -->
  <section class="pt-24 pb-20 bg-gradient-to-br from-[#5F8D4E] to-[#285430]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="text-light">
          <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Ketahui Segalanya<br />Mengenai Gempa Bumi
          </h1>
          <p class="text-lg text-light opacity-90 mb-8 leading-relaxed">
            Platform informasi lengkap dan terpercaya tentang aktivitas seismik di Indonesia.
            Dapatkan data real-time, berita terkini, dan panduan keselamatan untuk melindungi diri dan keluarga.
          </p>
          <a href="data.php" class="inline-block bg-[#A4BE7B] text-[#285430] px-10 py-4 rounded-lg font-semibold hover:bg-light hover:scale-105 transition-all duration-300 shadow-xl">
            Lihat Selengkapnya
          </a>
        </div>
        <img src="assets/images/earth.png" class="absolute top-[-20vh] right-[-20vw]" />
      </div>
    </div>
  </section>

  <!-- Statistics Section -->
  <section class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-5xl font-bold text-center text-[#285430] mb-16">Data Gempa Bumi Terkini</h2>
      <div class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white border-4 border-[#5F8D4E] rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
          <div class="text-7xl font-bold text-[#5F8D4E] mb-4">10</div>
          <p class="text-gray-700 text-lg leading-relaxed">
            Gempa Bumi terjadi dalam 3 hari terakhir di Indonesia
          </p>
        </div>
        <div class="bg-white border-4 border-[#5F8D4E] rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
          <div class="text-7xl font-bold text-[#5F8D4E] mb-4">6,5</div>
          <p class="text-gray-700 text-lg leading-relaxed">
            Magnitudo rata-rata gempa yang terjadi belakangan
          </p>
        </div>
        <div class="bg-white border-4 border-[#5F8D4E] rounded-3xl p-10 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
          <div class="text-7xl font-bold text-[#5F8D4E] mb-4">&gt;10</div>
          <p class="text-gray-700 text-lg leading-relaxed">
            Provinsi di Indonesia mengalami gempa bumi
          </p>
        </div>
      </div>
      <div class="text-center">
        <a href="data.php" class="inline-block bg-[#285430] text-light px-10 py-4 rounded-lg font-semibold hover:bg-[#5F8D4E] hover:scale-105 transition-all duration-300 shadow-lg">
          Lihat Selengkapnya
        </a>
      </div>
    </div>
  </section>

  <!-- News Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="bg-gradient-to-br from-[#A4BE7B] to-[#5F8D4E] h-96 rounded-3xl shadow-2xl flex items-center justify-center border-4 border-[#285430] border-opacity-10">
          <svg class="w-32 h-32 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div>
          <h2 class="text-5xl font-bold text-[#285430] mb-6">
            Berita Terkini Gempa<br />Bumi yang Terjadi
          </h2>
          <p class="text-gray-600 text-lg mb-8 leading-relaxed">
            Ikuti perkembangan terbaru tentang aktivitas gempa bumi di seluruh Indonesia dengan informasi yang akurat, cepat, dan terpercaya dari berbagai sumber resmi.
          </p>
          <a href="berita.php" class="inline-block bg-[#5F8D4E] text-light px-10 py-4 rounded-lg font-semibold hover:bg-[#285430] hover:scale-105 transition-all duration-300 shadow-lg">
            Lihat Selengkapnya
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Education Section -->
  <section class="py-20 bg-gradient-to-br from-light to-[#A4BE7B]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-start">
        <div>
          <h2 class="text-5xl font-bold text-[#285430] mb-6">Edukasi & Informasi</h2>
          <p class="text-gray-700 text-lg mb-8 leading-relaxed">
            Pelajari lebih lanjut tentang gempa bumi, cara mitigasi risiko, dan langkah-langkah penyelamatan yang tepat untuk melindungi diri dan keluarga dari bahaya gempa.
          </p>
          <a href="edukasi.php" class="inline-block bg-[#285430] text-light px-10 py-4 rounded-lg font-semibold hover:bg-[#5F8D4E] hover:scale-105 transition-all duration-300 shadow-lg">
            Lihat Selengkapnya
          </a>
        </div>
        <div class="grid grid-cols-3 gap-6">
          <!-- Penyebab -->
          <div class="text-center group cursor-pointer">
            <div class="bg-gradient-to-br from-[#5F8D4E] to-[#285430] rounded-2xl h-40 mb-4 flex items-center justify-center group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300">
              <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <h3 class="font-bold text-[#285430] text-lg">Penyebab</h3>
          </div>
          <!-- Mitigasi -->
          <div class="text-center group cursor-pointer">
            <div class="bg-gradient-to-br from-[#5F8D4E] to-[#285430] rounded-2xl h-40 mb-4 flex items-center justify-center group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300">
              <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <h3 class="font-bold text-[#285430] text-lg">Mitigasi</h3>
          </div>
          <!-- Kerugian -->
          <div class="text-center group cursor-pointer">
            <div class="bg-gradient-to-br from-[#5F8D4E] to-[#285430] rounded-2xl h-40 mb-4 flex items-center justify-center group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300">
              <svg class="w-20 h-20 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <h3 class="font-bold text-[#285430] text-lg">Kerugian</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-5xl font-bold text-[#285430] mb-6">Tentang Nadi Bumi</h2>
          <p class="text-gray-600 text-lg leading-relaxed mb-4">
            Nadi Bumi adalah platform terdepan dalam menyediakan informasi komprehensif tentang aktivitas seismik di Indonesia. Kami berkomitmen untuk memberikan data yang akurat, real-time, dan mudah dipahami oleh masyarakat luas.
          </p>
          <p class="text-gray-600 text-lg leading-relaxed">
            Dengan teknologi terkini dan kerjasama dengan berbagai institusi penelitian, kami membantu masyarakat untuk lebih siap dan tanggap menghadapi ancaman bencana gempa bumi di Indonesia.
          </p>
        </div>
        <div class="bg-gradient-to-br from-[#A4BE7B] to-[#5F8D4E] h-96 rounded-3xl shadow-2xl flex items-center justify-center border-4 border-[#285430] border-opacity-10">
          <svg class="w-32 h-32 text-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include __DIR__ . "/includes/_footer.php" ?>