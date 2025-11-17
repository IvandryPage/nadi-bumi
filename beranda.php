<?php
require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/data/gempa.php";
date_default_timezone_set('Asia/Jakarta');

// ============================
//   HITUNG STATISTIK GEMPA
// ============================
$now = time();
$weekAgo = strtotime('-3 days');

$gempaHariIni = 0;
$gempaMingguIni = 0;
$totalMagnitude = 0;
$totalCount = 0;
$wilayahList = [];

foreach ($gempa as $g) {
  // waktu
  if (!empty($g['DateTime'])) {
    $timestamp = strtotime($g['DateTime']);
  } else {
    $tanggal = $g['Tanggal'] ?? '';
    $jam = str_replace('WIB', '', ($g['Jam'] ?? ''));
    $timestamp = strtotime("$tanggal $jam");
  }
  if (!$timestamp) continue;

  // hari ini
  if (date('Y-m-d', $timestamp) === date('Y-m-d')) {
    $gempaHariIni++;
  }

  // 3 hari
  if ($timestamp >= $weekAgo && $timestamp <= $now) {
    $gempaMingguIni++;
  }

  // magnitudo
  if (!empty($g['Magnitude'])) {
    $totalMagnitude += floatval(str_replace(',', '.', $g['Magnitude']));
    $totalCount++;
  }

  // wilayah
  if (!empty($g['Wilayah'])) $wilayahList[] = $g['Wilayah'];
}

$rataMagnitude = $totalCount ? round($totalMagnitude / $totalCount, 2) : 0;
$provinsiTerdampak = count(array_unique($wilayahList));

// ============================
//   BERITA TERKINI (DATABASE)
// ============================
$news_query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 1");
$beritaTerkini = mysqli_fetch_assoc($news_query);

include __DIR__ . "/includes/_header.php";
?>

<main class="pt-16">

  <!-- Hero Section -->
  <section class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="text-light">
          <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Ketahui Segalanya<br />Mengenai Gempa Bumi
          </h1>
          <p class="text-lg text-light opacity-90 mb-8">
            Platform informasi lengkap dan terpercaya tentang aktivitas seismik di Indonesia.
          </p>
          <a href="data-gempa.php"
            class="px-6 py-3 inline-block bg-gradient-to-b from-[#59BA6A] to-[#285430] text-white font-semibold rounded-lg">
            Lihat Selengkapnya
          </a>
        </div>

        <img src="assets/images/earth.png"
          class="absolute z-[-1] w-[50vw] h-[50vw] top-[-10vh] right-[-12vw]" />
      </div>
    </div>
  </section>

  <!-- Statistics Section -->
  <section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <h2 class="text-5xl font-bold text-center text-primary mb-16">Data Gempa Bumi Terkini</h2>

      <div class="grid md:grid-cols-3 gap-8 mb-12">

        <!-- Gempa minggu ini -->
        <div class="p-[3px] rounded-3xl bg-gradient-to-b to-[#59BA6A] from-[#285430]">
          <div class="bg-white p-10 rounded-3xl text-center">
            <div class="text-7xl font-bold text-secondary mb-4"><?= $gempaMingguIni ?></div>
            <p class="text-gray-700">Gempa dalam 3 hari terakhir</p>
          </div>
        </div>

        <!-- Magnitudo rata-rata -->
        <div class="p-[3px] rounded-3xl bg-gradient-to-b to-[#59BA6A] from-[#285430]">
          <div class="bg-white p-10 rounded-3xl text-center">
            <div class="text-7xl font-bold text-secondary mb-4"><?= $rataMagnitude ?></div>
            <p class="text-gray-700">Magnitudo rata-rata</p>
          </div>
        </div>

        <!-- Provinsi -->
        <div class="p-[3px] rounded-3xl bg-gradient-to-b to-[#59BA6A] from-[#285430]">
          <div class="bg-white p-10 rounded-3xl text-center">
            <div class="text-7xl font-bold text-secondary mb-4"><?= $provinsiTerdampak ?></div>
            <p class="text-gray-700">Provinsi terdampak</p>
          </div>
        </div>

      </div>

      <div class="text-center">
        <a href="data-gempa.php#DataGempa"
          class="px-6 py-3 inline-block bg-gradient-to-b from-[#59BA6A] to-[#285430] text-white font-semibold rounded-lg">
          Lihat Selengkapnya
        </a>
      </div>

    </div>
  </section>

  <!-- News Section -->
  <?php if ($beritaTerkini): ?>
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">

        <div class="h-96 rounded-3xl overflow-hidden shadow-2xl border-4 border-primary/10">
          <img src="assets/images/<?= htmlspecialchars($beritaTerkini['gambar']) ?>"
            class="w-full h-full object-cover"
            alt="<?= htmlspecialchars($beritaTerkini['judul']) ?>">
        </div>

        <div>
          <h2 class="text-5xl font-bold text-primary mb-4">
            Berita Terkini Gempa Bumi
          </h2>

          <h3 class="text-2xl font-bold text-primary mb-4">
            <?= htmlspecialchars($beritaTerkini['judul']) ?>
          </h3>

          <p class="text-gray-600 mb-4">
            <?= date('d M Y', strtotime($beritaTerkini['tanggal'])) ?>
          </p>

          <a href="berita-detail.php?id=<?= $beritaTerkini['idBerita'] ?>"
            class="px-6 py-3 inline-block bg-gradient-to-b from-[#59BA6A] to-[#285430] text-white font-semibold rounded-lg">
            Baca Selengkapnya
          </a>
        </div>

      </div>
    </section>
  <?php endif; ?>

</main>

<?php include __DIR__ . "/includes/_footer.php"; ?>