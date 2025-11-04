<?php
$cacheFile = __DIR__ . "/cache_gempa.json";
// $cacheTime = 300; // cache for 5 minutes

// $jsonString = '';

// if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
//   $jsonString = file_get_contents($cacheFile);
// } else {
//   $url = "https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json";
//   $jsonString = @file_get_contents($url);
//   if ($jsonString) file_put_contents($cacheFile, $jsonString);
// }

$jsonString = file_get_contents("./data/gempa.json");
$data = json_decode($jsonString, true);
$gempa = [];

if (isset($data['Infogempa']['gempa']) && is_array($data['Infogempa']['gempa'])) {
  $gempa = $data['Infogempa']['gempa'];
} else if (isset($data['Infogempa']['gempa'])) {
  $gempa[] = $data['Infogempa']['gempa'];
}
