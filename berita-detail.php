<?php
include __DIR__ . "/includes/_header.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil berita sesuai ID
$query = "SELECT * FROM berita WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$berita = mysqli_fetch_assoc($result);
?>

<div class="pt-20 min-h-screen bg-gradient-to-b from-[#E5F2E1] to-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <?php if ($berita): ?>
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-[#285430] mb-4">
          <?= htmlspecialchars($berita['judul']) ?>
        </h1>
        <p class="text-sm text-[#5F8D4E] mb-8">
          Dipublikasikan pada <?= date('d M Y, H:i', strtotime($berita['tanggal'])) ?>
        </p>

        <div class="rounded-3xl overflow-hidden shadow-xl mb-8 border-4 border-[#A4BE7B]">
          <img
            src="assets/images/<?= htmlspecialchars($berita['gambar']) ?>"
            alt="<?= htmlspecialchars($berita['judul']) ?>"
            class="w-full h-[450px] object-cover">
        </div>

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
          <?= nl2br($berita['isi']) ?>
        </div>
      </div>

      <!-- Berita Lainnya -->
      <div class="mt-16">
        <h2 class="text-2xl font-bold text-[#285430] mb-6">Berita Lainnya</h2>
        <div class="grid md:grid-cols-3 gap-6">
          <?php
          $other_query = "SELECT id, judul, gambar, tanggal FROM berita WHERE id != $id ORDER BY tanggal DESC LIMIT 3";
          $other_result = mysqli_query($koneksi, $other_query);
          while ($row = mysqli_fetch_assoc($other_result)):
          ?>
            <a href="berita-detail.php?id=<?= $row['id'] ?>"
              class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-2xl transition border-2 border-transparent hover:border-[#5F8D4E] block">
              <div class="relative h-40 overflow-hidden">
                <img
                  src="assets/images/<?= htmlspecialchars($row['gambar']) ?>"
                  alt="<?= htmlspecialchars($row['judul']) ?>"
                  class="w-full h-full object-cover">
              </div>
              <div class="p-4">
                <h4 class="font-bold text-[#285430] text-lg mb-2"><?= htmlspecialchars($row['judul']) ?></h4>
                <p class="text-sm text-[#5F8D4E]"><?= date('d M Y', strtotime($row['tanggal'])) ?></p>
              </div>
            </a>
          <?php endwhile; ?>
        </div>
      </div>

    <?php else: ?>
      <div class="text-center py-32">
        <h2 class="text-3xl text-gray-600 font-semibold mb-4">Berita tidak ditemukan</h2>
        <a href="berita.php" class="text-[#285430] font-semibold underline">Kembali ke daftar berita</a>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php include __DIR__ . "/includes/_footer.php"; ?>