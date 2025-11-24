<?php
session_start();
// Konfigurasi Database
$db_host = "localhost";
$db_user = "root";
$db_pass = ""; 
$db_name = "nadibumi";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ==========================================
// LOGIC: AUTHENTICATION
// ==========================================
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $data['idAdmin'];
        $_SESSION['admin_name'] = $data['username'];
        header("Location: admin.php");
        exit;
    } else {
        $error_login = "Username atau Password salah!";
    }
}

// Cek Login
if (!isset($_SESSION['admin_logged_in']) && !isset($_POST['login'])) {
    $is_login_page = true;
} else {
    $is_login_page = false;
}

// ==========================================
// LOGIC: CRUD HANDLERS
// ==========================================
$view = isset($_GET['view']) ? $_GET['view'] : 'dashboard';
$adminId = $_SESSION['admin_id'] ?? '';

// --- HANDLER BERITA ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_berita'])) {
    $idBerita = $_POST['idBerita'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $tanggal = $_POST['tanggal'];
    $mode = $_POST['mode'];

    $gambar = $_POST['old_gambar'];
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $filename = time() . "_" . basename($_FILES["gambar"]["name"]);
        // move_uploaded_file($_FILES["gambar"]["tmp_name"], "assets/images/" . $filename); // Uncomment di server asli
        $gambar = $filename; 
    }

    if ($mode == 'add') {
        $newId = "B" . rand(100, 999); 
        $query = "INSERT INTO berita (idBerita, judul, gambar, isi, tanggal, idAdmin) VALUES ('$newId', '$judul', '$gambar', '$isi', '$tanggal', '$adminId')";
    } else {
        $query = "UPDATE berita SET judul='$judul', isi='$isi', tanggal='$tanggal', gambar='$gambar' WHERE idBerita='$idBerita'";
    }
    mysqli_query($koneksi, $query);
    header("Location: admin.php?view=berita&msg=success"); exit;
}

// --- HANDLER PENAMPUNGAN ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_penampungan'])) {
    $kodePenampungan = $_POST['kodePenampungan'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['namaPenampungan']);
    $daerah = mysqli_real_escape_string($koneksi, $_POST['daerah']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $kapasitas = intval($_POST['kapasitas']);
    $lat = floatval($_POST['latitude']);
    $lon = floatval($_POST['longitude']);
    $mode = $_POST['mode'];

    if ($mode == 'add') {
        $newId = "P" . rand(100, 999);
        $query = "INSERT INTO penampungan (kodePenampungan, namaPenampungan, daerah, kapasitas, longitude, latitude, alamat, idAdmin) 
                  VALUES ('$newId', '$nama', '$daerah', $kapasitas, $lon, $lat, '$alamat', '$adminId')";
    } else {
        $query = "UPDATE penampungan SET namaPenampungan='$nama', daerah='$daerah', kapasitas=$kapasitas, longitude=$lon, latitude=$lat, alamat='$alamat' 
                  WHERE kodePenampungan='$kodePenampungan'";
    }
    if(mysqli_query($koneksi, $query)) {
        header("Location: admin.php?view=penampungan&msg=success"); exit;
    } else {
        echo mysqli_error($koneksi); exit;
    }
}

// --- HANDLER RELAWAN ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_relawan'])) {
    $idRelawan = $_POST['idRelawan'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $domisili = mysqli_real_escape_string($koneksi, $_POST['domisili']);
    $kontak = mysqli_real_escape_string($koneksi, $_POST['kontak']);
    $kodePenampungan = mysqli_real_escape_string($koneksi, $_POST['kodePenampungan']);
    $mode = $_POST['mode'];

    if ($mode == 'add') {
        $newId = "R" . rand(100, 999);
        $query = "INSERT INTO relawan (idRelawan, nama, domisili, kontak, kodePenampungan) 
                  VALUES ('$newId', '$nama', '$domisili', '$kontak', '$kodePenampungan')";
    } else {
        $query = "UPDATE relawan SET nama='$nama', domisili='$domisili', kontak='$kontak', kodePenampungan='$kodePenampungan' 
                  WHERE idRelawan='$idRelawan'";
    }
    mysqli_query($koneksi, $query);
    header("Location: admin.php?view=relawan&msg=success"); exit;
}

// --- HANDLER DELETE GENERIC ---
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $type = $_GET['type']; // berita, penampungan, relawan

    if ($type == 'berita') {
        mysqli_query($koneksi, "DELETE FROM berita WHERE idBerita='$id'");
        header("Location: admin.php?view=berita&msg=deleted");
    } elseif ($type == 'penampungan') {
        mysqli_query($koneksi, "DELETE FROM penampungan WHERE kodePenampungan='$id'");
        header("Location: admin.php?view=penampungan&msg=deleted");
    } elseif ($type == 'relawan') {
        mysqli_query($koneksi, "DELETE FROM relawan WHERE idRelawan='$id'");
        header("Location: admin.php?view=relawan&msg=deleted");
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Nadi Bumi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Ubuntu', sans-serif; }
        .bg-nadi-dark { background-color: #285430; }
        .bg-nadi-light { background-color: #59BA6A; }
        .text-nadi-dark { color: #285430; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

<?php if ($is_login_page): ?>
    <!-- LOGIN PAGE -->
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-[#285430] to-[#59BA6A]">
        <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border-4 border-[#A4BE7B]">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-nadi-dark">NADI BUMI</h1>
                <p class="text-gray-500">Admin Login Portal</p>
            </div>
            
            <?php if(isset($error_login)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"><?= $error_login ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" name="username" class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#285430]" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#285430]" required>
                </div>
                <button type="submit" name="login" class="w-full bg-nadi-dark text-white font-bold py-3 rounded-lg hover:bg-[#1a3820] transition duration-300">MASUK</button>
            </form>
        </div>
    </div>

<?php else: ?>
    <!-- DASHBOARD LAYOUT -->
    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-nadi-dark text-white hidden md:flex flex-col">
            <div class="p-6 text-center border-b border-white/10">
                <h2 class="text-2xl font-bold font-['Audiowide']">ADMIN PANEL</h2>
                <p class="text-xs text-gray-300 mt-1">Halo, <?= $_SESSION['admin_name'] ?></p>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="?view=dashboard" class="block px-4 py-3 rounded-lg hover:bg-white/10 <?= $view == 'dashboard' ? 'bg-nadi-light' : '' ?>">
                    📊 Dashboard
                </a>
                <a href="?view=berita" class="block px-4 py-3 rounded-lg hover:bg-white/10 <?= strpos($view, 'berita') !== false ? 'bg-nadi-light' : '' ?>">
                    📰 Berita
                </a>
                <a href="?view=penampungan" class="block px-4 py-3 rounded-lg hover:bg-white/10 <?= strpos($view, 'penampungan') !== false ? 'bg-nadi-light' : '' ?>">
                    ⛺ Penampungan
                </a>
                <a href="?view=relawan" class="block px-4 py-3 rounded-lg hover:bg-white/10 <?= strpos($view, 'relawan') !== false ? 'bg-nadi-light' : '' ?>">
                    👥 Relawan
                </a>
            </nav>
            <div class="p-4 border-t border-white/10">
                <a href="?action=logout" class="block text-center px-4 py-2 bg-red-600 rounded-lg hover:bg-red-700 transition">Keluar</a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-8">
            <div class="md:hidden mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-nadi-dark">Nadi Bumi</h1>
                <a href="?action=logout" class="text-red-600 font-bold">Logout</a>
            </div>

            <!-- SUCCESS MESSAGE -->
            <?php if(isset($_GET['msg'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    <?= $_GET['msg'] == 'success' ? 'Data berhasil disimpan!' : 'Data berhasil dihapus!' ?>
                </div>
            <?php endif; ?>

            <!-- ======================= DASHBOARD ======================= -->
            <?php if ($view == 'dashboard'): ?>
                <h2 class="text-3xl font-bold text-nadi-dark mb-6">Dashboard Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <?php 
                        $cBerita = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita"));
                        $cRelawan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM relawan"));
                        $cPenampungan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penampungan"));
                    ?>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-[#285430]">
                        <div class="text-gray-500">Total Berita</div>
                        <div class="text-4xl font-bold text-nadi-dark"><?= $cBerita ?></div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-[#59BA6A]">
                        <div class="text-gray-500">Total Relawan</div>
                        <div class="text-4xl font-bold text-nadi-dark"><?= $cRelawan ?></div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-[#A4BE7B]">
                        <div class="text-gray-500">Posko Penampungan</div>
                        <div class="text-4xl font-bold text-nadi-dark"><?= $cPenampungan ?></div>
                    </div>
                </div>

            <!-- ======================= BERITA ======================= -->
            <?php elseif ($view == 'berita'): ?>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-nadi-dark">Daftar Berita</h2>
                    <a href="?view=berita_form&mode=add" class="bg-nadi-dark text-white px-6 py-2 rounded-lg hover:bg-green-900">+ Tambah</a>
                </div>
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-nadi-dark text-white"><tr><th class="p-4">Tanggal</th><th class="p-4">Judul</th><th class="p-4 text-center">Aksi</th></tr></thead>
                        <tbody class="divide-y">
                            <?php $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
                            while($r = mysqli_fetch_assoc($q)): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 text-sm"><?= $r['tanggal'] ?></td>
                                <td class="p-4 font-bold"><?= $r['judul'] ?></td>
                                <td class="p-4 text-center">
                                    <a href="?view=berita_form&mode=edit&id=<?= $r['idBerita'] ?>" class="text-blue-600 font-bold mr-2">Edit</a>
                                    <a href="?action=delete&type=berita&id=<?= $r['idBerita'] ?>" onclick="return confirm('Hapus?')" class="text-red-600 font-bold">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            <?php elseif ($view == 'berita_form'): ?>
                <?php
                    $mode = $_GET['mode'];
                    $d = null;
                    if ($mode == 'edit') {
                        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM berita WHERE idBerita='$id'"));
                    }
                ?>
                <h2 class="text-2xl font-bold text-nadi-dark mb-6"><?= $mode=='add'?'Tambah':'Edit' ?> Berita</h2>
                <form method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow">
                    <input type="hidden" name="mode" value="<?= $mode ?>">
                    <input type="hidden" name="idBerita" value="<?= $d['idBerita']??'' ?>">
                    <input type="hidden" name="old_gambar" value="<?= $d['gambar']??'' ?>">
                    
                    <div class="mb-4"><label class="block font-bold mb-2">Judul</label><input type="text" name="judul" value="<?= $d['judul']??'' ?>" class="w-full border p-2 rounded" required></div>
                    <div class="mb-4"><label class="block font-bold mb-2">Tanggal</label><input type="date" name="tanggal" value="<?= $d['tanggal']??date('Y-m-d') ?>" class="w-full border p-2 rounded" required></div>
                    <div class="mb-4"><label class="block font-bold mb-2">Isi</label><textarea name="isi" rows="5" class="w-full border p-2 rounded" required><?= $d['isi']??'' ?></textarea></div>
                    <div class="mb-6"><label class="block font-bold mb-2">Gambar</label><input type="file" name="gambar" class="w-full border p-2 rounded"></div>
                    
                    <button type="submit" name="save_berita" class="bg-nadi-dark text-white px-6 py-2 rounded font-bold">Simpan</button>
                    <a href="?view=berita" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold ml-2">Batal</a>
                </form>

            <!-- ======================= PENAMPUNGAN ======================= -->
            <?php elseif ($view == 'penampungan'): ?>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-nadi-dark">Daftar Penampungan</h2>
                    <a href="?view=penampungan_form&mode=add" class="bg-nadi-dark text-white px-6 py-2 rounded-lg hover:bg-green-900">+ Tambah</a>
                </div>
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-nadi-dark text-white"><tr><th class="p-4">Kode</th><th class="p-4">Nama</th><th class="p-4">Daerah</th><th class="p-4">Kapasitas</th><th class="p-4 text-center">Aksi</th></tr></thead>
                        <tbody class="divide-y">
                            <?php $q = mysqli_query($koneksi, "SELECT * FROM penampungan");
                            while($r = mysqli_fetch_assoc($q)): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 text-sm text-gray-500"><?= $r['kodePenampungan'] ?></td>
                                <td class="p-4 font-bold"><?= $r['namaPenampungan'] ?></td>
                                <td class="p-4"><?= $r['daerah'] ?></td>
                                <td class="p-4"><?= $r['kapasitas'] ?> Orang</td>
                                <td class="p-4 text-center">
                                    <a href="?view=penampungan_form&mode=edit&id=<?= $r['kodePenampungan'] ?>" class="text-blue-600 font-bold mr-2">Edit</a>
                                    <a href="?action=delete&type=penampungan&id=<?= $r['kodePenampungan'] ?>" onclick="return confirm('Hapus?')" class="text-red-600 font-bold">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            <?php elseif ($view == 'penampungan_form'): ?>
                <?php
                    $mode = $_GET['mode'];
                    $d = null;
                    if ($mode == 'edit') {
                        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM penampungan WHERE kodePenampungan='$id'"));
                    }
                ?>
                <h2 class="text-2xl font-bold text-nadi-dark mb-6"><?= $mode=='add'?'Tambah':'Edit' ?> Penampungan</h2>
                <form method="POST" class="bg-white p-8 rounded-xl shadow">
                    <input type="hidden" name="mode" value="<?= $mode ?>">
                    <input type="hidden" name="kodePenampungan" value="<?= $d['kodePenampungan']??'' ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block font-bold mb-2">Nama Penampungan</label><input type="text" name="namaPenampungan" value="<?= $d['namaPenampungan']??'' ?>" class="w-full border p-2 rounded" required></div>
                        <div><label class="block font-bold mb-2">Daerah (Kota/Kab)</label><input type="text" name="daerah" value="<?= $d['daerah']??'' ?>" class="w-full border p-2 rounded" required></div>
                    </div>
                    <div class="mb-4"><label class="block font-bold mb-2">Alamat Lengkap</label><input type="text" name="alamat" value="<?= $d['alamat']??'' ?>" class="w-full border p-2 rounded" required></div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div><label class="block font-bold mb-2">Kapasitas</label><input type="number" name="kapasitas" value="<?= $d['kapasitas']??'0' ?>" class="w-full border p-2 rounded" required></div>
                        <div><label class="block font-bold mb-2">Latitude</label><input type="text" name="latitude" value="<?= $d['latitude']??'0.0' ?>" class="w-full border p-2 rounded" required></div>
                        <div><label class="block font-bold mb-2">Longitude</label><input type="text" name="longitude" value="<?= $d['longitude']??'0.0' ?>" class="w-full border p-2 rounded" required></div>
                    </div>
                    
                    <button type="submit" name="save_penampungan" class="bg-nadi-dark text-white px-6 py-2 rounded font-bold">Simpan</button>
                    <a href="?view=penampungan" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold ml-2">Batal</a>
                </form>

            <!-- ======================= RELAWAN ======================= -->
            <?php elseif ($view == 'relawan'): ?>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-nadi-dark">Daftar Relawan</h2>
                    <a href="?view=relawan_form&mode=add" class="bg-nadi-dark text-white px-6 py-2 rounded-lg hover:bg-green-900">+ Tambah</a>
                </div>
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-nadi-dark text-white"><tr><th class="p-4">Nama</th><th class="p-4">Domisili</th><th class="p-4">Kontak</th><th class="p-4">Penampungan</th><th class="p-4 text-center">Aksi</th></tr></thead>
                        <tbody class="divide-y">
                            <?php 
                            // Join table untuk ambil nama penampungan
                            $q = mysqli_query($koneksi, "SELECT relawan.*, penampungan.namaPenampungan FROM relawan LEFT JOIN penampungan ON relawan.kodePenampungan = penampungan.kodePenampungan");
                            while($r = mysqli_fetch_assoc($q)): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-bold"><?= $r['nama'] ?></td>
                                <td class="p-4"><?= $r['domisili'] ?></td>
                                <td class="p-4"><?= $r['kontak'] ?></td>
                                <td class="p-4 text-sm text-green-700 font-semibold"><?= $r['namaPenampungan'] ?? '-' ?></td>
                                <td class="p-4 text-center">
                                    <a href="?view=relawan_form&mode=edit&id=<?= $r['idRelawan'] ?>" class="text-blue-600 font-bold mr-2">Edit</a>
                                    <a href="?action=delete&type=relawan&id=<?= $r['idRelawan'] ?>" onclick="return confirm('Hapus?')" class="text-red-600 font-bold">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            <?php elseif ($view == 'relawan_form'): ?>
                <?php
                    $mode = $_GET['mode'];
                    $d = null;
                    if ($mode == 'edit') {
                        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                        $d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM relawan WHERE idRelawan='$id'"));
                    }
                    // Ambil list penampungan untuk dropdown
                    $shelters = mysqli_query($koneksi, "SELECT kodePenampungan, namaPenampungan FROM penampungan");
                ?>
                <h2 class="text-2xl font-bold text-nadi-dark mb-6"><?= $mode=='add'?'Tambah':'Edit' ?> Relawan</h2>
                <form method="POST" class="bg-white p-8 rounded-xl shadow">
                    <input type="hidden" name="mode" value="<?= $mode ?>">
                    <input type="hidden" name="idRelawan" value="<?= $d['idRelawan']??'' ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block font-bold mb-2">Nama Lengkap</label><input type="text" name="nama" value="<?= $d['nama']??'' ?>" class="w-full border p-2 rounded" required></div>
                        <div><label class="block font-bold mb-2">Domisili</label><input type="text" name="domisili" value="<?= $d['domisili']??'' ?>" class="w-full border p-2 rounded" required></div>
                    </div>
                    <div class="mb-4"><label class="block font-bold mb-2">No. Kontak (HP)</label><input type="text" name="kontak" value="<?= $d['kontak']??'' ?>" class="w-full border p-2 rounded" required></div>
                    <div class="mb-6">
                        <label class="block font-bold mb-2">Penempatan Penampungan</label>
                        <select name="kodePenampungan" class="w-full border p-2 rounded" required>
                            <option value="">-- Pilih Posko --</option>
                            <?php while($s = mysqli_fetch_assoc($shelters)): ?>
                                <option value="<?= $s['kodePenampungan'] ?>" <?= (isset($d) && $d['kodePenampungan'] == $s['kodePenampungan']) ? 'selected' : '' ?>>
                                    <?= $s['namaPenampungan'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <button type="submit" name="save_relawan" class="bg-nadi-dark text-white px-6 py-2 rounded font-bold">Simpan</button>
                    <a href="?view=relawan" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold ml-2">Batal</a>
                </form>

            <?php endif; ?>
        </main>
    </div>
<?php endif; ?>

</body>
</html>
