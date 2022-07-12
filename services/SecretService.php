<?php
include '../utils/HTTP.php';
include '../cryptos/TripleDes.php';

$base_url = 'https://b857-103-16-61-182.ap.ngrok.io';
$key = 'verysecretkey';


$get_data = HTTP::request("GET", $base_url.'/secret');

$get_text = json_decode($get_data, true);

$plaintext = TripleDes::decrypt($get_text['data'],$key);

$file = fopen('../public/plaintext.txt', 'w');
fwrite($file, $plaintext);
fclose($file);

$get_image = json_decode(HTTP::request("GET", $base_url.'/secret?image=true'), true);


$d = TripleDes::decrypt($get_image['data'],$key);

$img = file_put_contents('image_decrypt_from_server.png',$d);


$post_text = HTTP::request("POST", $base_url.'/secret', json_encode([
    'data' => TripleDes::encrypt("I am a client side", $key)
]));

$encrypted_image = implode("\n", str_split(TripleDes::encrypt(file_get_contents("image_decrypt_from_server.png"), $key), 64));

$post_text = HTTP::request("POST", $base_url.'/secret?image=true', json_encode([
    'data' => $encrypted_image
]));

