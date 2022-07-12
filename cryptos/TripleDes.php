<?php

if(isset($_POST['message']))
{
    $ciphertext = TripleDes::encrypt($_POST['message'], $_POST['key']);

    echo 'Ciphertext : '.$ciphertext;

    echo '<br>';
    echo 'Plaintext : '.TripleDes::decrypt($ciphertext, $_POST['key']);
}

class TripleDes {

    public static function encrypt($plaintext, $key)
    {
        $ciphertext = openssl_encrypt($plaintext, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
        return base64_encode($ciphertext);
    }

    public static function decrypt($ciphertext, $key)
    {   
        $plaintext = openssl_decrypt(base64_decode($ciphertext), 'DES-EDE3', $key, OPENSSL_RAW_DATA);

        return $plaintext;
    }

}

?>