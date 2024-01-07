<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.github.com/gists/6bfbdc14c6292e195844032bea7211d1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;


$json = json_decode($response, TRUE)['files']['all-crawler-bots-user-agents.json']['content'];

// echo '<pre>';
// print_r($json);
$data = json_decode($json, TRUE);

foreach($data as $item){
    echo "User-Agent: " . $item['pattern'] . "\n";
    echo "Allow: / \n\n";
}
