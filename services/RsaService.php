<?php 

require '../utils/HTTP.php';
require '../cryptos/RSA.php';

// public key from the the server
$public_key = file_get_contents('keys/public.pem');

$api_server = 'https://b857-103-16-61-182.ap.ngrok.io/secret?algo=rsa';

$data = "This is the secret message";
$encrypted = "";   
$decrypted = "";   

// Get the ciphertext from the server and decrypt it
$response = HTTP::request("GET", $api_server);
$encrypted = json_decode($response, true);
echo 'Ciphertext  : '.$encrypted['data'].'<br>';
echo 'Decryption private : '.RSA::decrypt_public($encrypted['data'], $public_key).'<br>';

// Encrypt the plaintext and send it to the server
$send_message = HTTP::request("POST", $api_server, json_encode([
    'data' => RSA::encrypt_public($data, $public_key)
]));


