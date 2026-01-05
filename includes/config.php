<?php
// Error reporting (on for localhost, off for live)
$serverName = $_SERVER['SERVER_NAME'];
if (strpos($serverName, 'localhost') !== false) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Versioning for cache busting
$jscssverion = 1;

// Site-wide config
$site = "";

// Determine protocol and host
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$host     = $_SERVER['HTTP_HOST'];

// Auto-detect subfolder path (works for root domain AND subfolders)
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$basePath  = ($scriptDir === '/' || $scriptDir === '\\') ? '/' : rtrim($scriptDir, '/\\') . '/';

// Base URLs (auto-detects if in subfolder)
$site_url = $protocol . '://' . $host . $basePath;
$baseUrl  = $site_url;

// Meta & contact info
$domain              = $host;
$description         = "";
$phone_number        = "";
$href_phone_number   = "";

// Contact emails
$emailcont        = "";
$href_emailcont   = "mailto:{$emailcont}";
$admin_email      = '';

// AIIMS team / branding
$aiims_logo_svg_url = $site_url . 'assets/images/aiims.svg';
$aiimsflogolinks    = "https://www.aiims.com.au/like-our-work/";

// Optional CC and BCC
$cc_email  = "";
//$bcc_email = "kalbassit@aiims.com.au, jayoub@aiims.com.au, rkavirajan@aiims.com.au, robin@aiims.ae";
$bcc_email = "";

// Automatically generate no-reply based on registered domain (strips subdomains)
$host_clean = preg_replace('/^www\./i', '', $host);
$parts      = explode('.', $host_clean);
$len        = count($parts);

// if TLD is two letters and SLD ≤ 3 letters (e.g., com.au, co.uk), grab last 3 parts
if ($len >= 3 && strlen($parts[$len - 1]) === 2 && strlen($parts[$len - 2]) <= 3) {
    $emailDomain = implode('.', array_slice($parts, -3));
}
// otherwise grab last 2 parts
elseif ($len >= 2) {
    $emailDomain = implode('.', array_slice($parts, -2));
} else {
    $emailDomain = $host_clean;
}

$no_reply_email      = 'no-reply@' . $emailDomain;
$href_no_reply_email = 'mailto:' . $no_reply_email;

// Google reCAPTCHA keys
$recaptcha_client_secret = "6LeMkw4rAAAAAAGdKMHou6Nd5fkjYNwvToqdhW4x";
$recaptcha_server_secret = "6LeMkw4rAAAAAHTJH8l-imUOzo03RO_bzURrCmIT";

// Global content (shared data or meta)
require_once(__DIR__ . '/../data/global-content.php');
