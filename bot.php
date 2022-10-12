<?php
require 'config.php';
require 'vendor/autoload.php';


echo 'hello';
$input = file_get_contents('php://input');
function getTelegramApi($method, $opt = null){
  $url = API_URL . TOKEN . DIRECTORY_SEPARATOR . $method;
  if ($opt){
    $url .= http_build_query($opt);
  }
  $request = file_get_contents($url);
  return json_decode($request, true);
}

function setWebhook($set=true){
  $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  getTelegramApi('setWebhook',[
    'url' => $set ? $url : ''
  ]);
}