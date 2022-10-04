<?php

if($_GET['show_errors'] == 1) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function http_get_request($url, $headers = []) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        // CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
        CURLOPT_HTTPHEADER     => $headers,
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

if(!function_exists("str_starts_with")) {
    function str_starts_with( $haystack, $needle ) {
        $length = strlen( $needle );
        return substr( $haystack, 0, $length ) === $needle;
    }
}

if(!function_exists("str_ends_with")) {
    function str_ends_with( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        return substr( $haystack, -$length ) === $needle;
    }
}

if(!function_exists("str_contains")) {
    function str_contains($haystack, $needle) {
        return strpos($haystack, $needle) !== false;
    }
}

$okToProcess = false;

switch($_SERVER['SERVER_NAME']) {
    case "localhost":
    case "127.0.0.1":
    case "development1.servers.happilyhansen.net":
        $okToProcess = true;
        break;
}

if(!$okToProcess) {
    die();
}

if(!isset($_GET['u'])) {
    die();
}

$url = urldecode($_GET['u']);
$url_parsed = parse_url($url);

switch(strtolower($url_parsed['host'])) {
    case "forecast.weather.gov":
    case "api.weather.gov":
    case "api.weather.com":
    case "www.aviationweather.gov":
    case "www.wunderground.com":
    case "api-ak.wunderground.com":
    case "tidesandcurrents.noaa.gov":
    case "l-36.com":
    case "airquality.weather.gov":
    case "airnow.gov":
    case "www.airnowapi.org":
    case "www2.ehs.niu.edu":
    case "alerts.weather.gov":
    case "mesonet.agron.iastate.edu":
    case "tgftp.nws.noaa.gov":
    case "www.cpc.ncep.noaa.gov":
    case "api.usno.navy.mil":
    case "radar.weather.gov":
        // Allowed
        break;
    default:
        if(!str_ends_with($url, "?rss=1")) {
            http_response_code(403); // forbidden
            die();
        }
        break;
}

$headers = [];
if(str_contains($url, "api.weather.gov")) {
    $headers[] = "User-Agent: (WeatherStar 4000+/v1 (https://battaglia.ddns.net/twc; vbguyny@gmail.com)";
    $headers[] = "Accept: application/vnd.noaa.dwml+xml";
} else {
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36";
}

$origin = $url_parsed['scheme']."://".$url_parsed['host'];
$headers[] = "Origin: $origin";

$url_data = http_get_request($url, $headers);
if($url_data != "" && !is_null($url_data)) {
    if(str_ends_with($url, ".txt")) {
        die($url_data);
    } else {
        $image = $url_data;
        header("Content-Type: image/png");
        die($image);
    }
}
