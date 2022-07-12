<?php


if(isset($_POST['file']))
{
    VerifyCheckSumFile::verifyFile($_POST['file'], $_POST['sha256']);
}

class VerifyCheckSumFile {
    
    
    public static function verify($file)
    {
        $hash = openssl_digest(file_get_contents($file), 'sha256');

        return $hash;
    }

    public static function verifyFile($file, $sha_hash)
    {
        $hash = openssl_digest(file_get_contents($file), 'sha256');

        if ($hash == $sha_hash) {
            echo '<div style="height:100vh;width:100vw;display:grid;place-content:center;color:green;">File is safe ❤</div>';
        } else {
            echo '<div style="height:100vh;width:100vw;display:grid;place-content:center;color:red;">File is not safe 😢</div>';
        }
    }

}

?>