<?php
// map.php
require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/data/gempa.php";
$currentPage = basename($_SERVER['PHP_SELF']);

// Ambil data penampungan dari database (jaga kalau tabel atau kolom tidak ada)
$penampungan = [];
$penampQuery = "SELECT kodePenampungan, namaPenampungan, alamat, latitude, longitude, kapasitas FROM penampungan";
if ($res = @mysqli_query($koneksi, $penampQuery)) {
  while ($row = mysqli_fetch_assoc($res)) {
    // pastikan lat/lon valid (jika ada)
    if (!empty($row['latitude']) && !empty($row['longitude'])) {
      $penampungan[] = $row;
    } else {
      // jika tidak ada lat/lon, coba parse dari kolom lain atau skip
      // skip for now to avoid invalid markers
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nadi Bumi — Peta Interaktif</title>

  <!-- Nadi Bumi CSS -->
  <link rel="stylesheet" href="<?= dirname(__DIR__) . '/assets/css/global.css' ?>">

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&family=Audiowide&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Allow clicks to pass through translucent impact areas */
    .leaflet-interactive.impact-area {
      pointer-events: none !important;
    }

    /* small sidebar headings */
    .sidebar-section {
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      padding-bottom: 0.75rem;
      margin-bottom: 0.75rem;
    }

    .quake-item.active {
      background-color: #D8F3DC !important;
      border-left: 4px solid #59BA6A;
    }

    .shelter-item.active {
      background-color: #D8F3DC !important;
      border-left: 4px solid #59BA6A;
    }

    /* mobile: make aside scrollable full height */
    @media (max-width: 1024px) {
      aside {
        height: 40vh;
      }
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#59BA6A]/25 to-white overflow-x-hidden font-['Ubuntu']">

  <!-- Navigation -->
  <nav class="fixed top-0 left-0 w-full z-[1000] backdrop-blur-md bg-white/20 border-b border-white/30 text-[#285430] shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex space-x-8">
          <?php
          $navItems = [
            'beranda.php' => 'Beranda',
            'data-gempa.php' => 'Data Gempa',
            'berita.php' => 'Berita',
            'edukasi.php' => 'Edukasi & Informasi',
            'map.php' => 'Peta Interaktif'
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

  <!-- spacer -->
  <div class="h-16"></div>

  <!-- Map + Sidebar -->
  <div class="flex h-screen overflow-hidden">
    <!-- Map -->
    <div id="map" class="flex-1 relative z-0"></div>

    <!-- Sidebar -->
    <aside class="w-96 bg-white/90 backdrop-blur-md shadow-xl border-l border-[#59BA6A]/40 overflow-y-auto">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-[#285430] mb-4">Daftar Gempa</h2>
        <div id="earthquakeList" class="space-y-4 mb-6"></div>

        <div class="sidebar-section">
          <h3 class="text-lg font-semibold text-[#285430]">Lokasi Penampungan</h3>
          <p class="text-sm text-gray-600">Klik salah satu untuk melihat lokasi di peta.</p>
        </div>

        <div id="shelterList" class="space-y-4"></div>
      </div>
    </aside>
  </div>

  <script>
    // Data dari PHP
    const earthquakes = <?= json_encode($gempa, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const shelters = <?= json_encode($penampungan, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    // Inisialisasi peta
    const map = L.map('map').setView([-2.5, 118], 4.7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Kontainer sidebar
    const listContainer = document.getElementById("earthquakeList");
    const shelterContainer = document.getElementById("shelterList");

    // Simpan marker untuk kontrol
    const quakeMarkers = [];
    const shelterMarkers = [];

    // Helper: create simple icon (circle marker style)
    function createCircleMarker(lat, lon, options) {
      return L.circleMarker([lat, lon], {
        radius: options.radius || 6,
        color: options.color || '#800000',
        fillColor: options.fillColor || '#FF0000',
        fillOpacity: options.fillOpacity ?? 0.8,
        weight: options.weight ?? 1
      }).addTo(map);
    }

    // 1) Render Gempa
    earthquakes.forEach((eq, index) => {
      if (!eq.Coordinates) return;
      const coords = eq.Coordinates.split(',').map(Number);
      if (coords.length < 2) return;
      const lat = coords[0],
        lon = coords[1];
      const mag = parseFloat(eq.Magnitude) || 0;

      const color =
        mag >= 6 ? 'rgba(255, 0, 0, 0.6)' :
        mag >= 5 ? 'rgba(255, 80, 0, 0.5)' :
        'rgba(255, 150, 0, 0.4)';

      const radius = Math.pow(Math.max(mag, 0.1), 3) * 1000; // area radius

      // impact area (visual)
      const impactArea = L.circle([lat, lon], {
        color: color.replace('0.', '0.9'),
        fillColor: color,
        fillOpacity: 0.22,
        radius: radius,
        interactive: false
      }).addTo(map);
      // make impact-area non-interactive CSS class
      if (impactArea._path) impactArea._path.classList.add('impact-area');

      // marker
      const marker = createCircleMarker(lat, lon, {
        radius: 6,
        color: '#800000',
        fillColor: '#FF0000'
      });

      const popupContent = `
        <b>${eq.Wilayah}</b><br>
        Magnitudo: ${eq.Magnitude}<br>
        Kedalaman: ${eq.Kedalaman ?? '-'}<br>
        Potensi: ${eq.Potensi}<br>
        Waktu: ${eq.Tanggal} ${eq.Jam}
      `;
      marker.bindPopup(popupContent);
      quakeMarkers.push(marker);

      // sidebar item
      const item = document.createElement("div");
      item.className = "quake-item p-4 rounded-xl bg-[#E5D9B6]/60 hover:bg-[#A4BE7B]/40 cursor-pointer transition";
      item.innerHTML = `
        <div class="text-[#285430] font-bold text-lg">${eq.Wilayah}</div>
        <div class="text-sm text-gray-700">M ${eq.Magnitude} | ${eq.Tanggal} ${eq.Jam}</div>
      `;
      item.addEventListener('click', () => {
        // deactivate others
        document.querySelectorAll('.quake-item').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.shelter-item').forEach(el => el.classList.remove('active'));
        item.classList.add('active');

        map.flyTo([lat, lon], 7, {
          animate: true
        });
        marker.openPopup();
      });

      listContainer.appendChild(item);
    });

    // 2) Render Penampungan (shelters)
    shelters.forEach((s, idx) => {
      // try to parse lat/lon strings that might be comma-separated or numeric
      const lat = parseFloat(s.latitude);
      const lon = parseFloat(s.longitude);
      if (!isFinite(lat) || !isFinite(lon)) return;

      // different style for shelters: teal/blue
      const marker = createCircleMarker(lat, lon, {
        radius: 7,
        color: '#0B7285',
        fillColor: '#38B2AC',
        fillOpacity: 0.9
      });

      const popup = `
        <b>${s.namaPenampungan ?? s.kodePenampungan}</b><br>
        ${s.alamat ? (s.alamat + "<br>") : ""}
        ${s.kapasitas ? ("Kapasitas: " + s.kapasitas + " orang<br>") : ""}
        <small class="text-gray-600">Penampungan</small>
      `;
      marker.bindPopup(popup);
      shelterMarkers.push(marker);

      // sidebar item
      const sItem = document.createElement("div");
      sItem.className = "shelter-item p-4 rounded-xl bg-white/90 hover:bg-[#E5F2E1] cursor-pointer transition border border-[#A4BE7B]";
      sItem.innerHTML = `
        <div class="text-[#0B7285] font-bold text-lg">${s.namaPenampungan ?? s.kodePenampungan}</div>
        <div class="text-sm text-gray-700">${s.alamat ?? ''}</div>
      `;
      sItem.addEventListener('click', () => {
        document.querySelectorAll('.quake-item').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.shelter-item').forEach(el => el.classList.remove('active'));
        sItem.classList.add('active');

        map.flyTo([lat, lon], 14, {
          animate: true
        });
        marker.openPopup();
      });

      shelterContainer.appendChild(sItem);
    });

    // Fit bounds to show both earthquakes and shelters if available
    const allLatLngs = [];
    quakeMarkers.forEach(m => allLatLngs.push(m.getLatLng()));
    shelterMarkers.forEach(m => allLatLngs.push(m.getLatLng()));
    if (allLatLngs.length > 0) {
      try {
        const bounds = L.latLngBounds(allLatLngs);
        map.fitBounds(bounds.pad(0.25));
      } catch (e) {
        // fallback: keep default view
      }
    }
  </script>

  <?php include __DIR__ . "/includes/_footer.php" ?>
</body>

</html>