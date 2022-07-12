<?php 

class RSA {

    public static function encrypt_public($data, $public_key)
    {
        if (openssl_public_encrypt($data, $encrypted, $public_key))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data.');

        return $data;
    }

    public static function decrypt_public($data, $private_key)
    {
        if (openssl_public_decrypt(base64_decode($data), $decrypted, $private_key))
            $data = $decrypted;
        else
            '';

        return $data;
    }   

    
    public static function encrypt_private($data, $private_key)
    {
        if (openssl_private_encrypt($data, $encrypted, $private_key))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data.');

        return $data;
    }

    public static function decrypt_private($data, $private_key)
    {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $private_key))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }   

}