-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2025 at 12:49 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadi_bumi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nomerHP` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`, `nomerHP`) VALUES
('ADM001', 'budi', 'admin123', '081234567001'),
('ADM002', 'sari', 'admin123', '081234567002'),
('ADM003', 'eko', 'admin123', '081234567003'),
('ADM004', 'dina', 'admin123', '081234567004'),
('ADM005', 'fajar', 'admin123', '081234567005'),
('ADM006', 'lina', 'admin123', '081234567006'),
('ADM007', 'andi', 'admin123', '081234567007'),
('ADM008', 'maya', 'admin123', '081234567008'),
('ADM009', 'rama', 'admin123', '081234567009'),
('ADM010', 'intan', 'admin123', '081234567010'),
('ADM011', 'yusuf', 'admin123', '081234567011'),
('ADM012', 'salsa', 'admin123', '081234567012'),
('ADM013', 'bagas', 'admin123', '081234567013'),
('ADM014', 'nadia', 'admin123', '081234567014'),
('ADM015', 'ilham', 'admin123', '081234567015');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idBerita` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `judul` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `idAdmin` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idBerita`, `judul`, `gambar`, `isi`, `tanggal`, `idAdmin`) VALUES
('01', 'Gempa M5,0 Guncang Kaimana Papua Barat, Tidak Berpotensi Tsunami ', '01.png', 'Gempa kekuatan M5,0 mengguncang Pantai Selatan Kaimana, Papua Barat, Sabtu 01 November 2025 pukul 06.20.57 WIB.Hasil analisis Badan Meteorologi Klimatologi dan Geofisika (BMKG) menunjukkan gempabumi ini memiliki parameter update dengan magnitudo M4,9. \r\n\r\nEpisenter gempabumi terletak pada koordinat 4,52° LS ; 134,13° BT, atau tepatnya berlokasi di laut pada jarak 138 Km arah Tenggara Kaimana, Papua Barat pada kedalaman 34 km.\r\n \r\n\"Dengan memperhatikan lokasi episenter dan kedalaman hiposenternya, gempabumi yang terjadi merupakan jenis gempabumi dangkal akibat adanya aktivitas Sesar Tarera-Aiduna,\" ungkap Direktur Gempabumi dan Tsunami BMKG, Daryono.Daryono mengatakan, dari hasil analisis mekanisme sumber menunjukkan bahwa gempabumi memiliki mekanisme pergerakan geser (strike-slip).\r\n \r\nBerdasarkan estimasi peta guncangan (shakemap), gempabumi ini menimbulkan guncangan di daerah Kaimana, Teluk Etna, Buruway dengan skala intensitas II - III MMI (Getaran dirasakan nyata dalam rumah. Terasa getaran seakan akan truk berlalu). Hingga saat ini belum ada laporan dampak kerusakan yang ditimbulkan akibat gempabumi tersebut. \r\n\r\n\"Hasil pemodelan menunjukkan bahwa gempabumi ini tidak berpotensi tsunami,\" tegasnya.', '2025-11-01', NULL),
('02', 'Gempa Guncang Garut Pagi Ini, Warga Diminta Tetap Tenang', '02.png', 'Gempa bumi dengan magnitudo 3,0 mengguncang wilayah barat daya Kabupaten Garut, Jawa Barat, pada Sabtu (1/11/2025) pagi. Berdasarkan data sementara dari Badan Meteorologi, Klimatologi, dan Geofisika (BMKG), gempa terjadi pada pukul 05.24 WIB.\r\n\r\nMenurut informasi resmi BMKG, episentrum gempa terletak pada koordinat 7,86 Lintang Selatan dan 107,47 Bujur Timur, atau sekitar 85 kilometer barat daya Kabupaten Garut, Jawa Barat, dengan kedalaman 37 kilometer.BMKG menyebutkan, bahwa gempa tersebut termasuk dalam kategori gempa dangkal akibat aktivitas tektonik di wilayah tersebut. Hingga saat ini, belum ada laporan mengenai dampak kerusakan maupun guncangan yang dirasakan masyarakat di sekitar lokasi.', '2025-11-01', NULL),
('03', 'Gempa Dangkal Guncang Kolaka Timur Sulawesi Tenggara, Pusatnya di Darat', '03.png', 'Gempa bumi berkekuatan 2,9 magnitudo mengguncang wilayah Kabupaten Kolaka Timur, Sulawesi Tenggara pada Minggu (2/11/2025). Belum diketahui dampak dari gempa itu.\r\n\r\nBadan Meteorologi Klimatologi dan Geofisika (BMKG) menyebut, pusat gempa tersebut berada di darat.\"Mag:2.9, 02-Nov-25 13:47:31 WIB, Lok:4.02 LS, 121.83 BT (Pusat gempa berada di darat 10 km barat daya Kolaka Timur),\" tulis laman X @infoBMKG.\r\n\r\nBMKG juga melaporkan, gempa bumi berada di kedalaman 17 kilometer dan dirasakan di Kabupaten Kolaka Timur.', '2025-11-02', NULL),
('04', 'Gempa Guncang Bandung Dini Hari, Pusatnya di Darat', '04.png', 'Badan Meteorologi Klimatologi dan Geofisika (BMKG) melaporkan gempa bumi berkekuatan magnitudo 3,0 mengguncang wilayah Tenggara Bandung, Jawa Barat pada Minggu (2/11/2025) dini hari. Pusat gempa berada di darat.\r\n\r\n\"Mag: 3.0, 02-Nov-25 00:04:19 WIB, Lok: 7.16 LS, 107.63 BT (Pusat gempa berada di darat 19 km tenggara Bandung), Kedalaman: 4 Km,\" cuit laman X @infoBMKG.Gempa bumi turut dirasakan di wilayah Kertasari dan Pangalengan. Belum diketahui dampak gempa yang dihasilkan.\r\n\r\n\"Dirasakan (MMI) III Kertasari, III Pangalengan,\" jelasnya.', '2025-11-02', NULL),
('05', 'Gempa M 6,3 Guncang Timor Tengah Utara NTT, Tak Berpotensi Tsunami\r\n', '05.png', 'Gempa bumi berkekuatan Magnitudo 6,3 mengguncang Kabupaten Timor Tengah Utara, Nusa Tenggara Timur (NTT) pada Senin (27/10).\r\nBadan Meteorologi Klimatologi dan Geofisika (BMKG) mengungkapkan gempa itu terjadi pukul 00.04 WIB, Senin (27/10) dini hari WITA.\r\n\r\nMenurut unggahan akun X resmi BMKG, koordinat gempa tersebut berada di 9.06 Lintang Selatan dan 123.96 Bujur Timur.\r\nMenurut BMKG lokasi gempa berada di 82 kilometer Barat Laut Kabupaten Timor Tengah Utara, NTT atau 84 kilometer dari Kabupaten Lembata.\r\n\"Telah Terjadi gempa bumi dengan kekuatan: 6.3 SR, 82 km Barat Laut TIMOR TENGAHUT-NTT, waktu gempa: 27-Okt-25 00:04:28 WIB, Gempa ini tidak berpotensi TSUNAMI,\" mengutip laporan BMKG.\r\n\r\n\r\nGempa terasa hingga Kota Kupang, Maumere, Alor dan Lembata. Menurut Imanuel warga Kota Kupang, gempa berlangsung selama beberapa detik.\r\n\r\n\"Barang di rumah sempat goyang, lampu gantung juga goyang saat gempa,\" kata Imanuel dihubungi CNNIndonesia.com.\r\n\r\n', '2025-10-27', NULL),
('06', 'Gempa M 4,7 Getarkan Melonguane Sulawesi Utara\r\n\r\n', '06.png', 'Gempa bumi berkekuatan magnitudo 4,7 mengguncang wilayah Melonguane, Kabupaten Kepulauan Talaud, Sulawesi Utara (Sulut) pada Minggu (26/10) malam WIB.\r\nGempa tersebut tepatnya terjadi pada pukul 21.05 WIB. Gempa itu sendiri menurut BadanMeteorologi, Klimatologi, dan Geofisika (BMKG) terdeteksi di kedalaman 96 kilometer\r\n\r\nLokasi gempa itu sendiri berada di 5,71 Lintang Utara dan 126,91 Bujur Timur. Pusat gempa disebut berjarak 191 kilometer dari timur laut Kecamatan Melonguane, Sulut.\r\n\r\nSampai berita ini diturunkan, BMKG belum menyampaikan informasi mengenai dampak gempa tersebut. BMKG mengakui informasi yang disampaikan mengutamakan kecepatan sehingga pengolahan data masih belum stabil.\r\n\r\n', '2025-10-26', NULL),
('07', 'Sarmi Papua Diguncang 120 Gempa Susulan Sejak Kamis, Terbesar M 5,1\r\n\r\n', '07.png', 'Sebanyak 120 gempa susulan terjadi di wilayah Sarmi, Papua sejak Kamis (16/10). Terbaru, gempa berkekuatan M 5,1 mengguncang wilayah tersebut Minggu (19/10) pukul 09:52:35 WIB.\r\nBadan Meteorologi, Klimatologi, dan Geofisika (BMKG) menyebut gempa besar terbaru dengan parameter update M5,1 ini mengguncang wilayah Pantai Utara Sarmi, tepatnya pada koordinat 2,01° LS ; 138,95° BT. Gempa ini berlokasi di darat pada jarak 28 kilometer Tenggara Sarmi pada kedalaman 10 kilometer.\r\n\r\nDirektur Gempabumi dan Tsunami BMKG Daryono mengatakan gempa dangkal ini disebabkan pergerakan Sesar Anjak Mamberamo.\r\n\r\n\"Dengan memperhatikan lokasi episenter dan kedalaman hiposenternya, gempa bumi yang terjadi merupakan jenis gempa bumi dangkal akibat adanya aktivitas Sesar Anjak Mamberamo,\" kata Daryono dalam keterangannya, Minggu (19/10).\r\n\r\n\"Hasil analisis mekanisme sumber menunjukkan bahwa gempa bumi memiliki mekanisme pergerakan mendatar-naik (oblique thrust fault),\" tambahnya.\r\n\r\nDaryono mengatakan gempa ini tidak berpotensi menyebabkan tsunami.\r\n\r\nGempa ini disebut berdampak dan dirasakan di daerah Sarmi dengan skala intensitas II MMI yang artinya getaran dirasakan beberapa orang, serta benda-benda ringan yang digantung bergoyang.\r\n\r\nMenurut Daryono, gempa ini merupakan rangkaian gempa susulan dari gempa utama pada 16 Oktober pukul 12:48:54 WIB dengan kekuatan M 6.6.\r\n\r\nGempa utama sendiri menyebabkan sejumlah kerusakan mulai bangunan hancur hingga retakan di jalan dan sungai.\r\n\r\nTotal 120 gempa susulan terjadi sejak gempa utama mengguncang wilayah tersebut dengan kekuatan bervariasi antara M 2,2 hingga M 5,1.\r\n\r\n\"Hingga pukul 10:15 WIB, hasil monitoring BMKG menunjukkan ada 120 kejadian gempa bumi susulan (aftershock). Gempa Bumi susulan terbesar tercatat dengan magnitudo M5.1 dan terkecil M2.2,\" tuturnya.\r\n\r\nLebih lanjut, Daryono mengimbau masyarakat menghindari bangunan yang retak atau rusak akibat gempa. Masyarakat juga diimbau untuk memeriksa tidak ada kerusakan pada bangunan yang membahayakan kestabilan bangunan sebelum kembali ke dalam rumah.\r\n\r\n', '2025-10-19', NULL),
('08', 'Melonguane Sulut Diguncang Gempa Magnitudo 5,1\r\n\r\n', '08.png', 'Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) melaporkan telah terjadi gempa magnitudi 5,1 di Melonguane, Kepulauan Talaud, Sulawesi Utara pada Rabu (15/10) pukul 02.26 WIB.\r\nLokasi gempa dijelaskan berada di 7.36 LU, 127.17 BT atau 377 kilometer di Timur Laut Meloguane sedalam 10 kilometer.\r\n\r\nDalam unggahannya BMKG menyatakan informasi yang disajikan masih mengutamakan kecepatan sehingga hasil pengolahan data belum stabil dan bisa berubah seiring kelengkapan data.\r\n\r\nSebelumnya Melonguane juga mengalami gempa lebih kecil, yakni magnitudo 4,7 pada pukul 00.24 WIB dan magnitudo 4,3 pada Selasa (14/10) pukul 23.18 WIB.\r\n\r\n', '2025-10-15', NULL),
('09', 'Gempa Dangkal M 4,1 Guncang Merangin Jambi\r\n\r\n', '09.png', 'Gempa bumi berkekuatan magnitude 4,1 mengguncang Kabupaten Merangin, Provinsi Jambi, pada Senin (13/10) malam.\r\nBadan Meteorologi, Klimatologi, dan Geofisika (BMKG) melaporkan gempa terjadi sekitar pukul 22.09 WIB.\r\n\r\nGempa berpusat sekitar 50 kilometer barat daya Merangin dengan kedalaman 10 kilometer.\r\n\"#Gempa Mag:4.1, 13-Oct-2025 22:09:55WIB, Lok:2.60LS, 101.82BT (50 km BaratDaya MERANGIN-JAMBI), Kedlmn:10 Km #BMKG Disclaimer:Informasi ini mengutamakan kecepatan, sehingga hasil pengolahan data belum stabil dan bisa berubah seiring kelengkapan data,\" bunyi peringatan BMKG melalui akun X.\r\n\r\n', '2025-10-13', NULL),
('10', 'Gempabumi Tektonik M4,9 Dirasakan di Kabupaten Karawang, Jawa Barat', '10.png', 'Hari Rabu, 20 Agustus 2025 pukul 19:54:55 WIB, wilayah Kabupaten Karawang, Jawa Barat dan sekitarnya diguncang gempabumi tektonik. Hasil analisa BMKG menunjukkan bahwa gempabumi ini memiliki parameter update dengan magnitudo M 4,7. Episenter gempabumi terletak pada koordinat 6.52 LS dan 107.25 BT, atau tepatnya berlokasi di darat pada jarak 19 km Tenggara Kabupaten Bekasi, Jawa Barat pada kedalaman 10 km.\r\n\r\n\r\n\r\nDengan memperhatikan lokasi episenter dan kedalaman hiposenternya, gempabumi yang terjadi merupakan jenis gempabumi dangkal yang dipicu oleh sumber gempa sesar naik busur belakang Jawa Barat (West Java back arc thrust).\r\n\r\nDampak gempabumi berdasarkan laporan dari masyarakat, gempabumi ini dirasakan di wilayah Bekasi dengan Skala Intensitas III – IV MMI (Getaran dirasakan nyata dalam rumah, terasa getaran seakan-akan ada truk berlalu – Pada siang hari dirasakan oleh orang banyak dalam rumah, diluar oleh beberapa orang, gerabah pecah, jendela/pintu berderik dan dinding berbunyi), Di Purwakarta, Cikarang dan Depok dengan Skala Intensitas III MMI (Getaran dirasakan nyata dalam rumah. Terasa getaran seakan-akan ada truk berlalu), Di Bandung, Jakarta, Tangerang Selatan, Bekasi Timur dengan Skala Intensitas II – III MMI (Getaran dirasakan oleh beberapa orang, benda-benda ringan yang digantung bergoyang – Getaran dirasakan nyata dalam rumah. Terasa getaran seakan-akan ada truk berlalu), Di Tangerang, Pandegalang, Cianjur dan Pelabuhanratu, Lebak dengan Skala Intensitas II MMI (Getaran dirasakan oleh beberapa orang, benda-benda ringan yang digantung bergoyang). Namun hingga saat ini belum ada laporan mengenai kerusakan bangunan sebagai dampak gempabumi tersebut.\r\n\r\n\r\nHingga pukul WIB, hasil monitoring BMKG menunjukkan adanya 1 (satu) aktivitas gempabumi susulan dengan magnitude M2.1', '2025-08-20', NULL),
('11', 'Gempa Bogor 10 April 2025: Penyebab hingga Dampak\r\n', '11.png', 'awa Barat semalam dengan magnitudo (M) 4,1. Akibatnya, sejumlah bangunan rumah mengalami kerusakan akibat bencana tersebut.\r\nBadan Meteorologi, Klimatologi, dan Geofisika (BMKG) mencatat ada empat kali gempa susulan usai gempa utama. Simak informasinya\r\n\r\nGempa bumi berkekuatan M 4,1 mengguncang Kota Bogor, Jawa Barat pada Kamis (10/4/2025) malam. Guncangan dirasakan di wilayah Kabupaten Bogor, Kota Bogor, dan Kota Depok.\r\n\r\nPenyebab Gempa\r\nGempa M 4,1 terjadi di Kota Bogor, Jawa Barat. Pihak BMKG mengatakan pusat gempa berada di darat.\r\n\r\n\"Hasil analisa BMKG menunjukkan bahwa gempa bumi ini berkekuatan M 4,1. Episenter terletak pada koordinat 6,62 LS dan 106,8 BT, atau tepatnya berlokasi di darat pada jarak 2 km tenggara Kota Bogor, Jabar, pada kedalaman 5 km,\" kata Kepala BMKG Wilayah II Tangerang Hartanto dalam keterangannya, Kamis (10.4.2025).\r\n\r\n\"Dengan memperhatikan lokasi episenter dan kedalaman hiposenternya, gempabumi yang terjadi merupakan jenis gempa bumi dangkal akibat aktivitas sesar aktif,\" jelasnya.\r\n\r\nSementara itu, Direktur Gempabumi dan Tsunami BMKG Daryono menyebut gempa di Bogor merupakan jenis gempa tektonik kerak dangkal (shallow crustal earthquake) akibat aktivitas sesar aktif. Bukti bahwa gempa di Bogor adalah gempa tektonik tampak pada bentuk gelombang gempa hasil catatan sensor seismik DBJI (Darmaga) dan CBJI (Citeko) dengan karakteristik gelombang S (Shear) yang kuat dengan komponen frekuensi tinggi.\r\n\r\n\"Hasil analisis mekanisme sumber gempa oleh BMKG menunjukkan bahwa Gempa Bogor memiliki mekanisme geser (strike-slip),\" tutur Daryono.\r\n\r\n', '2025-04-11', NULL),
('12', 'Gempa Bekasi Jadi Gempa Bumi Merusak ke-29 Sepanjang 2025\r\n\r\n', '12.png', 'Gempa bumi berkekuatan M 4,7 yang mengguncang Bekasi, Jawa Barat pada Rabu (20/8/2025) malam, menambah daftar panjang bencana tektonik di Indonesia. Badan Geologi mencatat, gempa ini menjadi gempa bumi merusak ke-29 yang terjadi di Indonesia sepanjang tahun 2025.\r\nPenyelidik Bumi Ahli Utama Badan Geologi, Supartoyo menjelaskan, pusat gempa yang terjadi di Bekasi berasosiasi dengan Sesar Baribis, salah satu sesar aktif di Jawa bagian utara.\r\n\r\n\"Gempa di Bekasi yang terjadi semalam itu pusatnya di darat. Berdasarkan peta struktur geologi, gempa ini berasosiasi dengan sesar aktif, yakni zona Sesar Baribis atau ada juga yang menyebut sebagai Sesar Busur Belakang Jawa,\" jelas Supartoyo, Kamis (21/8/2025).\r\n\r\nSCROLL TO CONTINUE WITH CONTENT\r\n\r\nBaca juga:\r\nSesar Baribis, Patahan Aktif yang Melintasi Bekasi hingga Majalengka\r\nGempa Bekasi dilaporkan menimbulkan kerusakan. Karena itu, Badan Geologi menurut Supartoyo menggolongkan gempa yang terjadi di Bekasi sebagai gempa bumi merusak.\r\n\r\nADVERTISEMENT\r\n\"Menurut Katalog Gempa Bumi Merusak, kejadian gempa akibat Sesar Baribis di Bekasi ini dalam tahun ini merupakan yang ke-29. Mudah-mudahan tidak bertambah,\" kata Supartoyo.\r\n\r\nEnergi Tektonik yang Menumpuk\r\nSupartoyo menuturkan, gempa dipicu oleh penumpukan energi akibat pertemuan Lempeng Indo-Australia dan Eurasia di selatan Jawa.\r\n\r\n\"Energi ini menumpuk di sepanjang sesar, dalam hal ini Baribis. Energi itu harus dilepas. Kalau tidak dilepas lama, sekali lepas bisa lebih besar. Jadi lebih baik dilepas bertahap. Itu memang siklusnya,\" paparnya.\r\n\r\nZona Sesar Baribis sendiri menurutnya membentang cukup panjang sekitar 250 kilometer yang membentang dari Cirebon sampai Bekasi dan terbagi ke dalam beberapa segmentasi.\r\n\r\nBaca juga:\r\nRumah Warga di Bandung Barat Rusak Terdampak Gempa Bekasi\r\n\"Diduga mulai dari sebelah utara Bekasi, lalu ke utara Purwakarta, Subang, Cirebon, Majalengka, hingga ke Jawa Tengah dan diperkirakan menerus ke Surabaya,\" ungkap Supartoyo.\r\n\r\n\"Kebetulan gempa di Bekasi ini kemungkinan terjadi di segmen barat laut Jatiluhur,\" tambahnya.\r\n\r\nImbauan Masyarakat\r\nSupartoyo mengingatkan agar masyarakat tetap waspada namun tidak panik. Ia juga menjelaskan bahwa gempa susulan tidak akan lebih besar dari gempa utama.\r\n\r\n\"Jangan percaya isu atau hoaks. Cari informasi dari instansi resmi seperti Badan Geologi, BMKG, BNPB, atau BPBD,\" tegasnya.\r\n\r\nSebagai langkah mitigasi, masyarakat diminta menyiapkan jalur evakuasi dan latihan menghadapi bencana.\r\n\r\n\"Kalau misalnya kita sedang berada di lantai lima, harus tahu evakuasinya ke mana. Itu perlu dipelajari dan disiapkan,\" pungkas Supartoyo.\r\n\r\nGempa Bekasi dilaporkan menimbulkan kerusakan. Karena itu, Badan Geologi menurut Supartoyo menggolongkan gempa yang terjadi di Bekasi sebagai gempa bumi merusak.\r\n\r\n\r\n\"Menurut Katalog Gempa Bumi Merusak, kejadian gempa akibat Sesar Baribis di Bekasi ini dalam tahun ini merupakan yang ke-29. Mudah-mudahan tidak bertambah,\" kata Supartoyo.\r\n\r\n\r\n', '2025-08-21', NULL),
('13', 'Gempa Bumi Magnitudo 4.8 Mengguncang Tasikmalaya', '13.png', 'Tasikmalaya: Gempa bumi berkekuatan magnitudo 4.8 mengguncang Kabupaten Tasikmalaya, Jawa Barat, sekitar pukul 23.31 WIB, Minggu, 15 Juni 2025. Gempa terletak di koordinat 8.18 LS dan 107.64 BT tepat pada jarak 104 kilometer Barat daya Kabupaten Tasikmalaya kedalaman 10 kilometer tidak berpotensi tsunami.Yana, 38, warga Cipatujah mengatakan gempa bumi terasa getarannya sangat besar hingga tetangga rumah langsung keluar rumah untuk menyelamatkan diri. Getaran gempa itu cukup lama mengagetkan keluarga hingga warga lain yang tengah tidur.\"Gempa bumi yang terjadi memang sangat besar dan getarannya sangat kuat hingga membuat tetangga rumahnya berlari untuk menyelamatkan diri. Akan tetapi, setelah kejadian itu tetangga dan warga lain sudah kembali ke rumahnya mengingat kondisi di Tasikmalaya cerah meski kejadian malam hari begitu sunyi,\" kata Yana di Tasikmalaya, Senin, 16 Juni 2025.Sementara Kepala Bidang Pencegahan dan Kesiapsiagaan Badan Penanggulangan Bencana Daerah Kabupaten Tasikmalaya, Abdul Azis Riswandi, mengatakan gempa bumi magnitudo 4.8 yang terjadi berpusat di Kabupaten Tasikmalaya dan kedalaman 10 kilometer tidak berpotensi tsunami. Akan tetapi kejadian tersebut belum menerima laporan kerusakan rumah tapi relawan BPBD langsung bergerak mencari rumah terdampak.\r\n\r\n\"Untuk kondisi di wilayah Tasikmalaya masih berjalan normal dan relawan BPBD sedang melakukan pendataan rumah atas dampak gempa bumi yang dirasakan oleh masyarakat Tasikmalaya. Karena, lokasi terpusat di Kabupaten Tasikmalaya dan warga berada di Pangandaran merasakan getaran,\" ujarnya.\r\n\r\nDampak gempa bumi berdasarkan laporan dari masyarakat dirasakan di Pangandaran dan Tasikmalaya dengan skala II-III MMI (Getaran dirasakan oleh beberapa orang, benda ringan yang digantung bergoyang, dirasakan nyata dalam rumah, terasa getaran seakan akan ada truk berlalu).\r\n\r\n\r\n', '2025-06-16', NULL),
('B001', 'Gempa 4.2 Guncang Sukabumi', '01.png', 'Gempa dangkal mengguncang Sukabumi dengan magnitudo 4.2.', '2025-11-10', 'ADM001'),
('B002', 'Gempa M3,8 Terjadi di Lampung Utara', '02.png', 'Aktivitas tektonik memicu gempa kecil di Lampung Utara.', '2025-11-09', 'ADM002'),
('B003', 'Gempa Maluku Barat Daya M5,1', '03.png', 'BMKG melaporkan guncangan terasa hingga Saumlaki.', '2025-11-08', 'ADM003'),
('B004', 'Gempa 4.9 Terasa di Toba Samosir', '04.png', 'Pusat gempa berada di darat dekat Danau Toba.', '2025-11-07', 'ADM004'),
('B005', 'Gempa Kecil di Nusa Tenggara Timur', '05.png', 'Gempa dangkal tanpa potensi tsunami.', '2025-11-06', 'ADM005'),
('B006', 'Gempa 3.5 Mengguncang Padang Panjang', '06.png', 'BMKG mencatat gempa tektonik kerak dangkal.', '2025-11-05', 'ADM006'),
('B007', 'Getaran Terasa di Bandung M2,9', '07.png', 'Getaran lemah dirasakan beberapa warga.', '2025-11-05', 'ADM007'),
('B008', 'Gempa Bumi M4,8 Guncang Jayapura', '08.png', 'BMKG mencatat kedalaman gempa 10km.', '2025-11-04', 'ADM008'),
('B009', 'Gempa Kepulauan Talaud M5,2', '09.png', 'Gempa kuat terasa di Melonguane.', '2025-11-03', 'ADM009'),
('B010', 'Gempa Lombok Timur M3,7', '10.png', 'Getaran dirasakan warga sekitar.', '2025-11-03', 'ADM010'),
('B011', 'Gempa Aceh Tengah M4,0', '11.png', 'BMKG melaporkan aktivitas tektonik lokal.', '2025-11-02', 'ADM011'),
('B012', 'Gempa Papua Pegunungan M5,6', '12.png', 'Getaran sedang terasa di Oksibil.', '2025-11-02', 'ADM012'),
('B013', 'Gempa Banten M3,3', 'banten.jpg', 'Warga merasakan guncangan ringan.', '2025-11-01', 'ADM013'),
('B014', 'Gempa Kedalaman Menengah di Bali', 'bali.jpg', 'Gempa tidak berpotensi tsunami.', '2025-11-01', 'ADM014'),
('B015', 'Gempa Talaud Lagi M4,9', 'talaud2.jpg', 'BMKG: masih rangkaian aktivitas seismik.', '2025-10-31', 'ADM015');

-- --------------------------------------------------------

--
-- Table structure for table `glosarium`
--

CREATE TABLE `glosarium` (
  `idGlosarium` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `makna` text COLLATE utf8mb4_general_ci NOT NULL,
  `idAdmin` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `glosarium`
--

INSERT INTO `glosarium` (`idGlosarium`, `nama`, `makna`, `idAdmin`) VALUES
('G001', 'Magnitudo', 'Ukuran energi gempa bumi.', 'ADM001'),
('G002', 'Hiposenter', 'Titik pusat gempa di bawah permukaan.', 'ADM002'),
('G003', 'Episenter', 'Lokasi di permukaan bumi tepat di atas hiposenter.', 'ADM003'),
('G004', 'MMI', 'Skala intensitas guncangan.', 'ADM004'),
('G005', 'Sesar', 'Bidang rekahan tempat pergeseran batuan.', 'ADM005'),
('G006', 'Likuefaksi', 'Fenomena tanah menjadi cair akibat guncangan.', 'ADM006'),
('G007', 'Subduksi', 'Lempeng menukik ke bawah lempeng lain.', 'ADM007'),
('G008', 'Aftershock', 'Gempa susulan setelah gempa utama.', 'ADM008'),
('G009', 'Foreshock', 'Gempa kecil sebelum gempa utama.', 'ADM009'),
('G010', 'Seismograf', 'Alat pencatat gempa.', 'ADM010'),
('G011', 'Seismogram', 'Grafik rekaman gempa.', 'ADM011'),
('G012', 'Intensitas', 'Kekuatan guncangan di permukaan.', 'ADM012'),
('G013', 'Tsunami', 'Gelombang besar akibat gangguan bawah laut.', 'ADM013'),
('G014', 'Patahan', 'Zona pergeseran kerak bumi.', 'ADM014'),
('G015', 'Amplifikasi', 'Penguatan gelombang seismik oleh tanah lunak.', 'ADM015');

-- --------------------------------------------------------

--
-- Table structure for table `penampungan`
--

CREATE TABLE `penampungan` (
  `kodePenampungan` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `namaPenampungan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `daerah` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `idAdmin` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penampungan`
--

INSERT INTO `penampungan` (`kodePenampungan`, `namaPenampungan`, `daerah`, `kapasitas`, `longitude`, `latitude`, `alamat`, `idAdmin`) VALUES
('P001', 'Posko Gempa Aceh', 'Aceh', 250, 95.323, 5.553, 'Banda Aceh', 'ADM001'),
('P002', 'Shelter Padang', 'Sumbar', 300, 100.354, -0.949, 'Padang Barat', 'ADM002'),
('P003', 'Posko Bengkulu', 'Bengkulu', 180, 102.292, -3.795, 'Kota Bengkulu', 'ADM003'),
('P004', 'Posko Lampung Selatan', 'Lampung', 200, 105.242, -5.45, 'Kalianda', 'ADM004'),
('P005', 'Shelter Banten', 'Banten', 220, 106.154, -6.12, 'Serang', 'ADM005'),
('P006', 'Posko Bandung', 'Jabar', 260, 107.6, -6.914, 'Bandung Timur', 'ADM006'),
('P007', 'Posko Cilacap', 'Jateng', 240, 108.988, -7.732, 'Cilacap', 'ADM007'),
('P008', 'Shelter Yogyakarta', 'DIY', 300, 110.367, -7.801, 'Sleman', 'ADM008'),
('P009', 'Posko Malang', 'Jatim', 320, 112.631, -7.982, 'Malang', 'ADM009'),
('P010', 'Posko Denpasar', 'Bali', 200, 115.212, -8.67, 'Denpasar', 'ADM010'),
('P011', 'Shelter Lombok', 'NTB', 280, 116.107, -8.65, 'Mataram', 'ADM011'),
('P012', 'Posko Kupang', 'NTT', 300, 123.607, -10.177, 'Kupang', 'ADM012'),
('P013', 'Posko Manado', 'Sulut', 250, 124.846, 1.474, 'Manado', 'ADM013'),
('P014', 'Posko Ambon', 'Maluku', 220, 128.19, -3.654, 'Ambon', 'ADM014'),
('P015', 'Shelter Jayapura', 'Papua', 260, 140.703, -2.533, 'Jayapura', 'ADM015');

-- --------------------------------------------------------

--
-- Table structure for table `relawan`
--

CREATE TABLE `relawan` (
  `idRelawan` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `domisili` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `kodePenampungan` varchar(5) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relawan`
--

INSERT INTO `relawan` (`idRelawan`, `nama`, `domisili`, `kontak`, `kodePenampungan`) VALUES
('R001', 'Agus Pratama', 'Banda Aceh', '081234111001', 'P001'),
('R002', 'Siti Rahma', 'Padang', '081234111002', 'P002'),
('R003', 'Rudi Hartono', 'Bengkulu', '081234111003', 'P003'),
('R004', 'Dewi Ayu', 'Lampung', '081234111004', 'P004'),
('R005', 'Imam Wahyudi', 'Serang', '081234111005', 'P005'),
('R006', 'Putri Rahayu', 'Bandung', '081234111006', 'P006'),
('R007', 'Fikri Adnan', 'Cilacap', '081234111007', 'P007'),
('R008', 'Nia Lestari', 'Sleman', '081234111008', 'P008'),
('R009', 'Bambang Wijaya', 'Malang', '081234111009', 'P009'),
('R010', 'Kadek Surya', 'Denpasar', '081234111010', 'P010'),
('R011', 'Zulkifli', 'Mataram', '081234111011', 'P011'),
('R012', 'Maria Kristina', 'Kupang', '081234111012', 'P012'),
('R013', 'Stevanus', 'Manado', '081234111013', 'P013'),
('R014', 'Rama Halim', 'Ambon', '081234111014', 'P014'),
('R015', 'Dani Lesnusa', 'Jayapura', '081234111015', 'P015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idBerita`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `glosarium`
--
ALTER TABLE `glosarium`
  ADD PRIMARY KEY (`idGlosarium`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `penampungan`
--
ALTER TABLE `penampungan`
  ADD PRIMARY KEY (`kodePenampungan`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `relawan`
--
ALTER TABLE `relawan`
  ADD PRIMARY KEY (`idRelawan`),
  ADD KEY `kodePenampungan` (`kodePenampungan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `glosarium`
--
ALTER TABLE `glosarium`
  ADD CONSTRAINT `glosarium_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penampungan`
--
ALTER TABLE `penampungan`
  ADD CONSTRAINT `penampungan_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `relawan`
--
ALTER TABLE `relawan`
  ADD CONSTRAINT `relawan_ibfk_1` FOREIGN KEY (`kodePenampungan`) REFERENCES `penampungan` (`kodePenampungan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
