<?php
require_once "config.php";
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nadi Bumi</title>

  <!-- Nadi Bumi CSS -->
  <link rel="stylesheet" href="<?= dirname(__DIR__) . '/assets/css/global.css' ?>">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">

  <!-- Tailwind Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#59BA6A]/25 to-white to-white overflow-x-hidden font-['Ubuntu']">
  <header class="sticky top-10 left-0 w-full z-50 bg-[#000000]/10">
    <!-- Navigation -->
    <nav class="backdrop-blur-sm bg-[#000000]/10 text-[#285430] fixed w-full z-50 shadow-lg border-b border-white/40">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex space-x-8">
            <?php
            $navItems = [
              'beranda.php' => 'Beranda',
              'data-gempa.php' => 'Data Gempa',
              'berita.php' => 'Berita',
              'edukasi.php' => 'Edukasi & Informasi'
            ];

            foreach ($navItems as $file => $label) {
              $isActive = $currentPage === $file ? 'text-[#59BA6A] font-bold' : 'hover:text-[#A4BE7B] font-medium';
              echo "<a href=\"$file\" class=\"$isActive transition duration-300\">$label</a>";
            }
            ?>
          </div>
          <div class="text-2xl font-bold tracking-wide text-white font-['AudioWide']">NADI BUMI</div>
        </div>
      </div>
    </nav>


  </header>