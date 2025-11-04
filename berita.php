<?php include __DIR__ . "/includes/_header.php" ?>

<div class="pt-20 min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Page Title -->
    <div class="mb-12">
      <span class="inline-block border-4 border-[#285430] bg-white rounded-full px-10 py-4 text-2xl font-bold text-[#285430] shadow-xl">
        Berita Terkini
      </span>
    </div>

    <!-- Featured News -->
    <div class="grid lg:grid-cols-2 gap-8 mb-16">
      <div class="bg-gradient-to-br from-[#5F8D4E] to-[#285430] h-96 rounded-3xl shadow-2xl flex items-center justify-center border-4 border-[#A4BE7B] border-opacity-30 overflow-hidden group">
        <svg class="w-40 h-40 text-[#E5D9B6] opacity-70 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <div class="flex flex-col justify-center bg-white p-8 rounded-3xl shadow-xl border-4 border-[#5F8D4E]">
        <span class="inline-block bg-[#285430] text-[#E5D9B6] px-4 py-1 rounded-full text-sm font-semibold mb-4 w-fit">HEADLINE</span>
        <h3 class="text-4xl font-bold text-[#285430] mb-4 leading-tight">
          Gempa 7.2 SR Guncang Sulawesi Tengah, Warga Diminta Waspada Tsunami
        </h3>
        <p class="text-gray-600 mb-4">BMKG mencatat gempa berkekuatan 7.2 skala richter mengguncang wilayah Sulawesi Tengah pada pukul 14.30 WIB. Pusat gempa berada di kedalaman 10 km...</p>
        <p class="text-[#5F8D4E] font-semibold">2 jam yang lalu</p>
      </div>
    </div>

    <!-- Side News Grid -->
    <div class="grid lg:grid-cols-3 gap-6 mb-16">
      <?php
      $sideNews = [
        ['title' => 'Gempa 5.8 SR Guncang Jawa Timur', 'time' => '3 jam lalu'],
        ['title' => 'BMKG: Waspadai Gempa Susulan', 'time' => '5 jam lalu'],
        ['title' => 'Evakuasi Korban Gempa Berlangsung', 'time' => '6 jam lalu']
      ];

      foreach ($sideNews as $news):
      ?>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border-2 border-[#A4BE7B] cursor-pointer">
          <div class="bg-gradient-to-br from-[#A4BE7B] to-[#5F8D4E] h-40 flex items-center justify-center">
            <svg class="w-16 h-16 text-[#E5D9B6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <div class="p-6">
            <h4 class="font-bold text-[#285430] text-lg mb-2"><?= $news['title'] ?></h4>
            <p class="text-sm text-[#5F8D4E]"><?= $news['time'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- News Grid -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">
      <?php
      $allNews = [
        ['title' => 'Gempa Berkekuatan 6.1 SR di Maluku Utara', 'time' => '12 menit lalu', 'category' => 'Breaking News'],
        ['title' => 'Update: Tidak Ada Korban Jiwa', 'time' => '25 menit lalu', 'category' => 'Update'],
        ['title' => 'Getaran Gempa Terasa Hingga Kota Tetangga', 'time' => '45 menit lalu', 'category' => 'Laporan'],
        ['title' => 'Tim SAR Siaga di Lokasi Gempa', 'time' => '1 jam lalu', 'category' => 'Update'],
        ['title' => 'Analisis: Pola Gempa 3 Bulan Terakhir', 'time' => '2 jam lalu', 'category' => 'Analisis'],
        ['title' => 'Warga Diminta Tetap Tenang dan Waspada', 'time' => '3 jam lalu', 'category' => 'Himbauan'],
        ['title' => 'Infrastruktur Rusak Akibat Gempa', 'time' => '4 jam lalu', 'category' => 'Laporan'],
        ['title' => 'Bantuan Mulai Berdatangan ke Lokasi', 'time' => '5 jam lalu', 'category' => 'Update'],
        ['title' => 'Posko Pengungsian Dibuka di 5 Lokasi', 'time' => '6 jam lalu', 'category' => 'Informasi']
      ];

      foreach ($allNews as $news):
      ?>
        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-[#5F8D4E]">
          <div class="bg-gradient-to-br from-[#E5D9B6] to-[#A4BE7B] h-52 flex items-center justify-center relative">
            <svg class="w-20 h-20 text-[#5F8D4E] opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="absolute top-4 left-4 bg-[#285430] text-[#E5D9B6] px-3 py-1 rounded-full text-xs font-semibold">
              <?= $news['category'] ?>
            </span>
          </div>
          <div class="p-6">
            <h4 class="font-bold text-[#285430] text-lg mb-3 leading-tight"><?= $news['title'] ?></h4>
            <p class="text-sm text-[#5F8D4E] font-medium"><?= $news['time'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Load More Button -->
    <div class="text-center">
      <button class="border-3 border-[#285430] bg-white text-[#285430] px-12 py-4 rounded-xl hover:bg-[#285430] hover:text-[#E5D9B6] transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-2xl">
        Muat Berita Lainnya
      </button>
    </div>
  </div>
</div>

<?php include __DIR__ . "/includes/_footer.php" ?>