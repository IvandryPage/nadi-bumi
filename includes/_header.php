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
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            roboto: ['Ubuntu', 'sans-serif'],
          },
        },
      },
    }
  </script>

  <!-- Tailwind Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-earthSand text-earthDark font-['Ubuntu']">
  <header class="bg-earthSand shadow-sm fixed top-0 left-0 w-full z-50">
    <div class="max-w-[1440px] mx-auto px-8 h-16 flex items-center justify-between">
      <nav class="flex items-center space-x-10 text-earthDark text-lg">
        <a href="index.php" class="hover:text-earthGreen transition-colors">Beranda</a>
        <a href="data-gempa.php" class="hover:text-earthGreen transition-colors">Data Gempa</a>
        <a href="mitigasi.php" class="hover:text-earthGreen transition-colors">Berita</a>
        <a href="mitigasi.php" class="hover:text-earthGreen transition-colors">Edukasi & Informasi</a>
      </nav>
      <div class="text-earthDark text-2xl font-bold uppercase tracking-wide">Nadi Bumi</div>
    </div>
  </header>
  <div class="h-16"></div>