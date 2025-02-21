<?php 

$allowed_ips = []; // Allow only these IPs/Host names
$cache_duration = $_ENV['CACHE_DURATION']; // 1 hour
$r = '*';
if(count($allowed_ips)>0){
    $r = '';
    for($i=0; $i<=count($allowed_ips); $i++){
        $r .= $allowed_ips[$i].',';
    }
    $r = rtrim($r,",");
}

header("Cache-Control: public, max-age=$cache_duration");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $cache_duration) . " GMT");

header("Access-Control-Allow-Origin: $r"); // Allow any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers
header("Content-Type: application/json");
header("X-Frame-Options: DENY"); // Prevent clickjacking
header("X-Content-Type-Options: nosniff"); // Prevent MIME-type sniffing
header("Content-Security-Policy: default-src 'self'"); // Restrict content sources


if(count($allowed_ips)>0){
    if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
        die(json_encode(["error"=>"Access Denied"]));
    }
}


