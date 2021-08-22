<?php
$clusterId = "";
$apiKey = "";
$apiSecret = "";

function sendMessage($channel, $message){ 
  global $apiKey;
  global $apiSecret;
  global $clusterId;

  $curl = curl_init();
  $post_fields = [
    "key" => $apiKey,
    "secret" => $apiSecret, 
    "channelId" => $channel,
    "message" => $message
  ];
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://".$clusterId.".piesocket.com/api/publish",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($post_fields),
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));

  $response = curl_exec($curl);
  return $response;
}

?>