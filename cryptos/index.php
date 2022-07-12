<?php
include 'TripleDes.php';
include 'VerifyCheckSumFile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify File</title>
    <style>
        body {
            display: grid;
            place-content: center;
        }

        .input {
            width: 100%;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .upload {
            width: 100%;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>
    <h1>Triple DES </h1>
    <form action="TripleDes.php" method="post">
        <label>Message : </label>
        <input type="text" name="message" id="message" required>
        <label>Key : </label>
        <input type="text" name="key" id="key" required>
        <input type="submit" value="Verify">
    </form>

    <h1>Verify Check Sum Of File</h1>
    <span style="color:red;">* same directory only</span>
    <br>
    <form action="VerifyCheckSumFile.php" method="post" >
        
        <label>File : </label>
        <input class="upload" type="file" name="file" id="file" required>
        <label>SHA-256 Hashing Value : </label>
        <input type="text" name="sha256" id="sha256" required>
        <input type="submit" value="Verify" >
    </form>


</body>

</html>