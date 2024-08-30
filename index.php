<?php

require_once realpath(__DIR__) .  DIRECTORY_SEPARATOR . 'lib.php';

// Create a Cryp object
$CrypX = new CrypX;

$sampleText = "Library for encryption and decryption of strings or integers, based on PHP";
$textToCrypx = $CrypX->getMethodPost('encrypt', $sampleText);
$bytes = $CrypX->getMethodPost('bytes', 16);

// Generate a random key (you can specify the number of bytes)
$key = $CrypX->getRand('bin2hex', $bytes);

// Generate a random IV
$iv = $CrypX->getRand('encode');

// Encrypt and decrypt, sending the $key and $iv variables for both encryption and decryption.
// If they don't match, decryption will fail.
$encrypted = $CrypX->encrypt($textToCrypx, $key, $iv);
$decrypted = $CrypX->decrypt($encrypted, $key, $iv);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
<title>Prueba crypPHP</title>
</head>
<body>

	<main class="container">
	
		<form method="POST" action="index.php">
  			<fieldset class="grid">
    			<input name="encrypt" placeholder="<?= $sampleText ?>" value="<?= $_POST['encrypt'] ?? '' ?>" />
    			<input type="number" name="bytes" placeholder="<?= $bytes ?>" value="<?= $_POST['bytes'] ?? '' ?>" />
    			<input type="submit" value="Encriptar" />
  			</fieldset>
		</form>

		<p><strong>KEY:</strong> <?= $key ?></p>
		<p><strong>IV:</strong> <?= $iv ?></p>
		<p><strong>Encrypted:</strong> <?= $encrypted ?></p>
		<p><strong>Decrypted:</strong> <?= $decrypted ?></p>
	</main>

</body>
</html>