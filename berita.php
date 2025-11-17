<?php
require_once __DIR__ . "/includes/config.php";
include __DIR__ . "/includes/_header.php";
date_default_timezone_set('Asia/Jakarta');

// ================================
//  Ambil Headline (berita terbaru)
// ================================
$headlineQ = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 1");
$headline = mysqli_fetch_assoc($headlineQ);

// ================================
//  Ambil 9 berita selanjutnya
// ================================
$newsQ = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 9 OFFSET 1");
?>

<div class="pt-20 min-h-screen bg-gradient-to-b from-[#E5F2E1] to-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Page Title -->
    <div class="mb-12">
      <span class="inline-block border-4 border-[#285430] bg-white rounded-full px-10 py-4 text-2xl font-bold text-[#285430] shadow-xl">
        Berita Terkini
      </span>
    </div>

    <!-- ===========================
          HEADLINE
    ============================ -->
    <?php if ($headline): ?>

      <div class="grid lg:grid-cols-2 gap-8 mb-16">

        <!-- Gambar Headline -->
        <div class="h-96 rounded-3xl overflow-hidden shadow-2xl border-4 border-[#A4BE7B]">
          <img
            src="assets/images/<?= htmlspecialchars($headline['gambar']) ?>"
            alt="<?= htmlspecialchars($headline['judul']) ?>"
            class="w-full h-full object-cover">
        </div>

        <!-- Konten Headline -->
        <div class="flex flex-col justify-center bg-white p-8 rounded-3xl shadow-xl border-4 border-[#5F8D4E]">
          <span class="inline-block bg-[#285430] text-[#E5D9B6] px-4 py-1 rounded-full text-sm font-semibold mb-4 w-fit">
            HEADLINE
          </span>

          <h3 class="text-4xl font-bold text-[#285430] mb-4 leading-tight">
            <?= htmlspecialchars($headline['judul']) ?>
          </h3>

          <p class="text-gray-600 mb-4">
            <?= substr(strip_tags($headline['isi']), 0, 150) ?>...
          </p>

          <div class="flex items-center justify-between">
            <p class="text-[#5F8D4E] font-semibold">
              <?= date('d M Y, H:i', strtotime($headline['tanggal'])) ?>
            </p>

            <a href="berita-detail.php?id=<?= $headline['idBerita'] ?>"
              class="bg-[#285430] text-[#E5D9B6] px-6 py-2 rounded-lg hover:bg-[#5F8D4E] transition">
              Baca Selengkapnya
            </a>
          </div>
        </div>

      </div>

    <?php endif; ?>

    <!-- ===========================
          BERITA LAINNYA
    ============================ -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">

      <?php while ($news = mysqli_fetch_assoc($newsQ)): ?>
        <a href="berita-detail.php?id=<?= $news['idBerita'] ?>"
          class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border-2 border-transparent hover:border-[#5F8D4E] block">

          <div class="relative h-52 overflow-hidden">
            <img
              src="assets/images/<?= htmlspecialchars($news['gambar']) ?>"
              alt="<?= htmlspecialchars($news['judul']) ?>"
              class="w-full h-full object-cover">

            <span class="absolute top-4 left-4 bg-[#285430] text-[#E5D9B6] px-3 py-1 rounded-full text-xs font-semibold">
              <?= date('d M', strtotime($news['tanggal'])) ?>
            </span>
          </div>

          <div class="p-6">
            <h4 class="font-bold text-[#285430] text-lg mb-3 leading-tight">
              <?= htmlspecialchars($news['judul']) ?>
            </h4>

            <p class="text-sm text-[#5F8D4E] font-medium">
              <?= date('H:i', strtotime($news['tanggal'])) ?>
            </p>
          </div>

        </a>
      <?php endwhile; ?>

    </div>

  </div>
</div>

<?php include __DIR__ . "/includes/_footer.php"; ?>