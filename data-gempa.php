<?php
require_once "data/gempa.php";
include "includes/_header.php";

// // Pastikan bentuknya array indeks numerik (bukan hanya 1 item)
// if (isset($gempa['Tanggal'])) {
//   $gempa = [$gempa]; // ubah ke array berisi 1 elemen
// }

date_default_timezone_set('Asia/Jakarta');
$perPage = 5;
$totalItems = count($gempa);
$totalPages = max(1, ceil($totalItems / $perPage));
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalPages));
$offset = ($page - 1) * $perPage;

// Slice data untuk pagination
$currentPageData = array_slice($gempa, $offset, $perPage);

// Inisialisasi statistik
date_default_timezone_set('Asia/Jakarta');

$now = time();
$weekAgo = strtotime('-7 days');

$gempaHariIni = 0;
$gempaMingguIni = 0;
$totalMagnitude = 0;
$totalCount = 0;
$wilayahList = [];

foreach ($gempa as $item) {
  // ambil waktu gempa
  if (!empty($item['DateTime'])) {
    $timestamp = strtotime($item['DateTime']);
  } else {
    $tanggal = $item['Tanggal'] ?? '';
    $jam = str_replace('WIB', '', ($item['Jam'] ?? ''));
    $timestamp = strtotime("$tanggal $jam");
  }

  if (!$timestamp) continue; // skip kalau gagal dibaca

  // cek hari ini
  if (date('Y-m-d', $timestamp) === date('Y-m-d', $now)) {
    $gempaHariIni++;
  }

  // cek 7 hari terakhir
  if ($timestamp >= $weekAgo && $timestamp <= $now) {
    $gempaMingguIni++;
  }

  // hitung magnitudo rata-rata
  if (!empty($item['Magnitude'])) {
    $totalMagnitude += floatval(str_replace(',', '.', $item['Magnitude']));
    $totalCount++;
  }

  // kumpulkan wilayah
  if (!empty($item['Wilayah'])) {
    $wilayahList[] = $item['Wilayah'];
  }
}

$rataMagnitude = $totalCount ? round($totalMagnitude / $totalCount, 2) : 0;
$provinsiTerdampak = count(array_unique($wilayahList));
?>

<div class="pt-20 min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Map Section -->
    <div class="grid lg:grid-cols-5 gap-8 mb-20">
      <div class="lg:col-span-2">
        <h1 class="text-6xl font-bold text-[#285430] mb-6 leading-tight">TITIK GEMPA BUMI</h1>
        <p class="text-gray-700 text-lg mb-8 leading-relaxed">
          Visualisasi real-time lokasi pusat gempa bumi yang terjadi di seluruh Indonesia dengan detail koordinat, kedalaman, dan magnitudo lengkap.
        </p>
        <a href="data-gempa.php"
          class="mt-6 inline-block px-6 py-3 text-white font-semibold rounded-lg  bg-gradient-to-b from-[#59BA6A] to-[#285430] hover:opacity-90 transition">
          Lihat Peta Interaktif
        </a>
      </div>
      <div class="lg:col-span-3 bg-gradient-to-br from-[#A4BE7B] to-[#5F8D4E] h-96 rounded-3xl shadow-2xl flex items-center justify-center border-4 border-[#285430] border-opacity-10 overflow-hidden group">
        <svg class="w-40 h-40 text-[#E5D9B6] group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-[#A4BE7B]" id="DataGempa">
      <h2 class="text-5xl font-bold text-center text-[#285430] mb-4">DATA GEMPA BUMI</h2>
      <p class="text-center text-gray-600 text-lg mb-12">Rekapitulasi Gempa Bumi di Indonesia</p>

      <!-- Search & Filter (non-functional placeholder) -->
      <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="md:w-1/4">
          <button class="w-full border-3 border-[#5F8D4E] bg-white text-[#5F8D4E] px-6 py-4 rounded-xl font-semibold hover:bg-[#5F8D4E] hover:text-[#E5D9B6] transition-all duration-300 shadow-lg flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter Data
          </button>
        </div>
        <div class="md:w-3/4 flex gap-2">
          <input type="text" placeholder="Cari berdasarkan lokasi, tanggal, atau magnitudo..."
            class="flex-1 border-3 border-[#5F8D4E] px-6 py-4 rounded-xl focus:outline-none focus:border-[#285430] transition-all duration-300 shadow-lg" />
          <button class="bg-[#285430] text-[#E5D9B6] px-8 py-4 rounded-xl font-semibold hover:bg-[#5F8D4E] transition-all duration-300 shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Cari
          </button>
        </div>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto mb-8">
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-[#285430] to-[#5F8D4E] text-[#E5D9B6]">
              <th class="px-6 py-4 text-left font-bold">No</th>
              <th class="px-6 py-4 text-left font-bold">Tanggal & Waktu</th>
              <th class="px-6 py-4 text-left font-bold">Wilayah</th>
              <th class="px-6 py-4 text-left font-bold">Magnitudo</th>
              <th class="px-6 py-4 text-left font-bold">Kedalaman</th>
              <th class="px-6 py-4 text-left font-bold">Potensi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($currentPageData)): ?>
              <?php foreach ($currentPageData as $index => $item): ?>
                <tr class="border-b border-[#A4BE7B] hover:bg-[#E5D9B6] transition-all duration-200">
                  <td class="px-6 py-4 font-medium text-gray-800"><?= $offset + $index + 1 ?></td>
                  <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($item['Tanggal']) ?> — <?= htmlspecialchars($item['Jam']) ?></td>
                  <td class="px-6 py-4 font-medium text-gray-800"><?= htmlspecialchars($item['Wilayah']) ?></td>
                  <td class="px-6 py-4 font-bold text-[#5F8D4E]"><?= htmlspecialchars($item['Magnitude']) ?> SR</td>
                  <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($item['Kedalaman']) ?></td>
                  <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($item['Potensi']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center py-6 text-gray-500">Tidak ada data gempa yang tersedia.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-end items-center gap-2 mt-6">
        <?php if ($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>#DataGempa" class="w-12 h-12 flex items-center justify-center border-2 border-[#5F8D4E] rounded-xl hover:bg-[#5F8D4E] hover:text-[#E5D9B6] transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <a href="?page=<?= $i ?>#DataGempa"
            class="w-12 h-12 flex items-center justify-center <?= $i == $page ? 'bg-[#285430] text-[#E5D9B6]' : 'border-2 border-[#5F8D4E] hover:bg-[#5F8D4E] hover:text-[#E5D9B6]' ?> font-bold rounded-xl shadow-lg transition-all duration-300">
            <?= $i ?>
          </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
          <a href="?page=<?= $page + 1 ?>#DataGempa" class="w-12 h-12 flex items-center justify-center border-2 border-[#5F8D4E] rounded-xl hover:bg-[#5F8D4E] hover:text-[#E5D9B6] transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid md:grid-cols-4 gap-6 mt-12">
      <div class="bg-gradient-to-br from-[#285430] to-[#5F8D4E] text-[#E5D9B6] rounded-2xl p-6 shadow-xl text-center">
        <div class="text-4xl font-bold mb-2"><?= $gempaMingguIni ?></div>
        <p class="text-sm opacity-90">Total Gempa Minggu Ini</p>
      </div>
      <div class="bg-gradient-to-br from-[#5F8D4E] to-[#A4BE7B] text-[#E5D9B6] rounded-2xl p-6 shadow-xl text-center">
        <div class="text-4xl font-bold mb-2"><?= $gempaHariIni ?></div>
        <p class="text-sm opacity-90">Gempa Hari Ini</p>
      </div>
      <div class="bg-gradient-to-br from-[#A4BE7B] to-[#5F8D4E] text-[#285430] rounded-2xl p-6 shadow-xl text-center">
        <div class="text-4xl font-bold mb-2"><?= $rataMagnitude ?></div>
        <p class="text-sm opacity-90">Rata-rata Magnitudo</p>
      </div>
      <div class="bg-gradient-to-br from-[#285430] to-[#A4BE7B] text-[#E5D9B6] rounded-2xl p-6 shadow-xl text-center">
        <div class="text-4xl font-bold mb-2"><?= $provinsiTerdampak ?></div>
        <p class="text-sm opacity-90">Provinsi Terdampak</p>
      </div>
    </div>
  </div>
</div>

<?php include "includes/_footer.php"; ?>