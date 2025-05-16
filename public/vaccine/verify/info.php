<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output

$output = curl_exec($ch);
if ($output === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response received: ' . $output;
}
curl_close($ch);
