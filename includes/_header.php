<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nadi Bumi</title>

  <!-- Tailwind Play CDN -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            earthDark: '#285430',
            earthGreen: '#5F8D4E',
            earthLight: '#A4BE7B',
            earthSand: '#E5D9B6'
          }
        }
      }
    }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Custom CSS if needed -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-earthSand text-earthDark font-['Roboto']">
  <header class="bg-earthSand shadow-sm fixed top-0 left-0 w-full z-50">
    <div class="max-w-[1440px] mx-auto px-8 h-16 flex items-center justify-between">
      <nav class="flex items-center space-x-10 text-earthDark text-lg">
        <a href="index.php" class="hover:text-earthGreen transition-colors">Beranda</a>
        <a href="data-gempa.php" class="hover:text-earthGreen transition-colors">Data Gempa</a>
        <a href="mitigasi.php" class="hover:text-earthGreen transition-colors">Mitigasi</a>
      </nav>
      <div class="text-earthDark text-2xl font-bold uppercase tracking-wide">Nadi Bumi</div>
    </div>
  </header>
  <div class="h-16"></div>