<?php 

include '../utils/HTTP.php';
include '../cryptos/RSA.php';

$PRIVATE_KEY = file_get_contents('./keys-pair/private-key.pem');
$PUBLIC_KEY = file_get_contents('./keys-pair/public-key.pem');

$DESTINATION_PUBLIC_KEY = file_get_contents('keys/public.pem');

// Send message to server with public key 
$api_server = 'https://b857-103-16-61-182.ap.ngrok.io/e2ee';

$data = "This is the secret message";
$encrypted = "";   
$decrypted = "";   

// Get the ciphertext from the server and decrypt it
$response = HTTP::request("GET", $api_server);
$encrypted = json_decode($response, true);
echo 'Ciphertext  : '.$encrypted['data'].'<br>';
echo 'Decryption private by client public key : '.RSA::decrypt_private($encrypted['data'], $PRIVATE_KEY).'<br>';

// Encrypt the plaintext and send it to the server
$send_message = HTTP::request("POST", $api_server, json_encode([
    'data' => RSA::encrypt_public($data, $DESTINATION_PUBLIC_KEY)
]));


