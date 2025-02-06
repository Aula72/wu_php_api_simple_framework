<?php 

$cache_duration = 3600; // 1 hour
header("Cache-Control: public, max-age=$cache_duration");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $cache_duration) . " GMT");

header("Access-Control-Allow-Origin: *"); // Allow any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers
header("Content-Type: application/json");
header("X-Frame-Options: DENY"); // Prevent clickjacking
header("X-Content-Type-Options: nosniff"); // Prevent MIME-type sniffing
header("Content-Security-Policy: default-src 'self'"); // Restrict content sources

$allowed_ips = ['192.168.1.1', '203.0.113.0', '127.0.0.1'];  // Allow only these IPs
if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
    die("Access Denied");
}

