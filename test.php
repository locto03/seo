<?php
$domain = "listeruptionv2.net"; // Enter your domain here.

$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&"
    . "q=link:".$domain;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $domain);
$body = curl_exec($ch);
curl_close($ch);

$json = json_decode($body);
$urls = array();
foreach($json->responseData->results as $result) // Loop through the objects in the result
    $urls[] = $result->unescapedUrl;             // and add the URL to the array.
var_dump($urls);
?>