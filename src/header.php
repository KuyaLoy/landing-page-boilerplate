<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Base URL (auto-detects root or subfolder) -->
  <base href="<?= $baseUrl ?>">

  <!-- Basic Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= $site_url ?>">

  <!-- Open Graph Meta Tags (for social sharing) -->
  <meta property="og:title" content="<?= $site ?>" />
  <meta property="og:description" content="<?= $description ?>" />
  <meta property="og:image" content="<?= $site_url ?>ogimage.png" />
  <meta property="og:url" content="<?= $site_url ?>" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="<?= $site ?>" />

  <!-- HTML Meta Tags -->
  <title><?= $site; ?></title>
  <meta name="description" content="<?= $description; ?>">
  <meta name="author" content="<?= $site ?>">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="<?= $domain ?>">
  <meta property="twitter:url" content="<?= $site_url ?>">
  <meta name="twitter:title" content="<?= $site ?>">
  <meta name="twitter:description" content="<?= $description ?>">
  <meta name="twitter:image" content="<?= $site_url ?>ogimage.png">

  <!-- Favicon and Touch Icons -->
  <link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="assets/images/favicon.svg">
  <link rel="icon" type="image/svg+xml" sizes="32x32" href="assets/images/favicon.svg">

  <!-- Preload Critical Resources -->


  <!-- Preload Only Essential Fonts (reduce from 14 to 4-6 most used weights) -->


  <!-- Critical Inline CSS: reset, fonts, critical (nav to hero) -->
  <style>
    <?php
    include(__DIR__ . '/../assets/css/min/reset.min.css');
    include(__DIR__ . '/../assets/css/min/fonts.min.css');
    include(__DIR__ . '/../assets/css/min/critical.min.css');
    ?>
  </style>

  <!-- Non-Critical CSS (loaded asynchronously) -->
  <link rel="preload" href="assets/css/min/style.min.css?v=<?= $jscssverion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="assets/css/min/responsive.min.css?v=<?= $jscssverion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="assets/css/edit.css?v=<?= $jscssverion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="assets/css/vendor/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="assets/css/vendor/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

  <!-- Fallback for No JavaScript -->
  <noscript>
    <link rel="stylesheet" href="assets/css/min/style.min.css?v=<?= $jscssverion; ?>">
    <link rel="stylesheet" href="assets/css/min/responsive.min.css?v=<?= $jscssverion; ?>">
    <link rel="stylesheet" href="assets/css/edit.css?v=<?= $jscssverion; ?>">
    <link rel="stylesheet" href="assets/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/vendor/aos.css">
  </noscript>

</head>

<body>