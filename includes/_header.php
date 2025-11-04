<?php require_once "config.php"; ?>

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

  <!-- Tailwind Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-['Ubuntu']">
  <header class="sticky top-10 left-0 w-full z-50 bg-[#000000]/10">
    <!-- Navigation -->
    <nav class="bg-[#285430] text-white shadow-lg fixed w-full z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex space-x-8">
            <a href="index.php" class="text-[#E5D9B6] hover:text-[#A4BE7B] font-medium transition duration-300">Beranda</a>
            <a href="data-gempa.php" class="text-[#E5D9B6] hover:text-[#A4BE7B] font-medium transition duration-300">Data Gempa</a>
            <a href="berita.php" class="text-[#E5D9B6] hover:text-[#A4BE7B] font-medium transition duration-300">Berita</a>
            <a href="edukasi.php" class="text-[#E5D9B6] hover:text-[#A4BE7B] font-medium transition duration-300">Edukasi & Informasi</a>
          </div>
          <div class="text-2xl font-bold text-[#E5D9B6]">NADI BUMI</div>
        </div>
      </div>
    </nav>
  </header>