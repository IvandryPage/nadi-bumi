<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/data/gempa.php";
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

  <!-- Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  <!-- Font Ubuntu & AudioWire -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">

  <!-- Tailwind Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Allow clicks to pass through translucent impact areas */
    .leaflet-interactive.impact-area {
      pointer-events: none !important;
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#59BA6A]/25 to-white overflow-x-hidden font-['Ubuntu']">

  <!-- Navigation (kept fixed, above everything) -->
  <nav class="fixed top-0 left-0 w-full z-[1000] backdrop-blur-md bg-white/20 border-b border-white/30 text-[#285430] shadow-lg">
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
        <div class="text-2xl font-bold tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-[#59BA6A] to-[#A4BE7B] font-['Audiowide']">
          NADI BUMI
        </div>

      </div>
    </div>
  </nav>

  <!-- Add spacing so content doesn’t hide behind navbar -->
  <div class="h-16"></div>

  <!-- Map -->
  <div class="flex h-screen overflow-hidden">
    <!-- Map -->
    <div id="map" class="flex-1 relative z-0"></div>

    <!-- Sidebar -->
    <aside class="w-96 bg-white/80 backdrop-blur-md shadow-xl border-l border-[#59BA6A]/40 overflow-y-auto scrollbar-hide">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-[#285430] mb-4">Daftar Gempa</h2>
        <div id="earthquakeList" class="space-y-4"></div>
      </div>
    </aside>
  </div>

  <script>
    const earthquakes = <?= json_encode($gempa, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    const map = L.map('map').setView([-2.5, 118], 4.7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const listContainer = document.getElementById("earthquakeList");
    const markers = [];

    earthquakes.forEach((eq, index) => {
      if (!eq.Coordinates) return;

      const [lat, lon] = eq.Coordinates.split(',').map(Number);
      const mag = parseFloat(eq.Magnitude) || 0;

      const color =
        mag >= 6 ? 'rgba(255, 0, 0, 0.6)' :
        mag >= 5 ? 'rgba(255, 80, 0, 0.5)' :
        'rgba(255, 150, 0, 0.4)';

      const radius = Math.pow(mag, 3) * 1000;

      // Visual-only impact area
      const impactArea = L.circle([lat, lon], {
        color: color.replace('0.', '0.9'),
        fillColor: color,
        fillOpacity: 0.3,
        radius: radius,
        interactive: false // ensures it's not clickable
      }).addTo(map);
      impactArea._path.classList.add('impact-area');

      // Actual marker
      const marker = L.circleMarker([lat, lon], {
        color: '#800000',
        fillColor: '#FF0000',
        fillOpacity: 0.8,
        radius: 6
      }).addTo(map);

      const popupContent = `
      <b>${eq.Wilayah}</b><br>
      Magnitudo: ${eq.Magnitude}<br>
      Kedalaman: ${eq.Kedalaman ?? '-'}<br>
      Potensi: ${eq.Potensi}<br>
      Waktu: ${eq.Tanggal} ${eq.Jam}
    `;
      marker.bindPopup(popupContent);
      markers.push(marker);

      // Sidebar item
      const item = document.createElement("div");
      item.className = "quake-item p-4 rounded-xl bg-[#E5D9B6]/60 hover:bg-[#A4BE7B]/40 cursor-pointer transition";
      item.innerHTML = `
      <div class="text-[#285430] font-bold text-lg">${eq.Wilayah}</div>
      <div class="text-sm text-gray-700">Magnitudo ${eq.Magnitude} | ${eq.Tanggal} ${eq.Jam}</div>
    `;

      // Click event
      item.addEventListener('click', () => {
        // reset active styling
        document.querySelectorAll('.quake-item').forEach(el => el.classList.remove('active'));
        item.classList.add('active');

        map.flyTo([lat, lon], 7, {
          animate: true
        });
        marker.openPopup();
      });

      listContainer.appendChild(item);
    });
  </script>

  <style>
    .quake-item.active {
      background-color: #D8F3DC !important;
      border-left: 4px solid #59BA6A;
    }
  </style>
  <?php include __DIR__ . "/includes/_footer.php" ?>