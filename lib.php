<?php

class CrypX {

	/**
	 *  Obtener más métodos
	 * @link https://www.php.net/manual/en/function.openssl-get-cipher-methods.php
	 */
	protected $cipher_method = 'aes-256-cbc';

	protected $option = OPENSSL_RAW_DATA;

	public $bytes = 16;

 	/**
 	 * @link https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php
 	 */
	private function randomPseudoBytes(int $bytes = 0) {
    	return openssl_random_pseudo_bytes($bytes);
	}

	/**
	 * @link https://www.php.net/manual/es/function.openssl-cipher-iv-length.php
	 */
	private function validateIv(string $iv) {
    	if(strlen($iv) !== openssl_cipher_iv_length($this->cipher_method)) {
    		throw new InvalidArgumentException('Invalid IV length. It must be ' . openssl_cipher_iv_length($cryp->cipher_method) . ' bytes long.');
    	}
	}

 	/**
 	 * @link https://www.php.net/manual/en/function.openssl-encrypt.php
 	 */
	public function encrypt(string $data = '', string $key = '', string $iv = ''): string {
		$this->validateIv($iv);
		return base64_encode(openssl_encrypt($data, $this->cipher_method, $key, $this->option, $iv));
	}

 	/**
 	 * @link https://www.php.net/manual/en/function.openssl-decrypt.php
 	 */
	public function decrypt(string $data = '', string $key = '', string $iv = ''): string {
		$this->validateIv($iv);
		try {
    		$pase = openssl_decrypt(base64_decode($data), $this->cipher_method, $key, $this->option, $iv);
    		if ($pase === false || $pase === '') {
	      	throw new InvalidArgumentException('Decryption failed: Invalid data, key, or IV.');
	    	}
			return $pase;
		} catch (InvalidArgumentException $e) {
		   echo "Error al desencriptar: " . $e->getMessage();
		}
	}

	/*
	AMBOS ESTAN EN getRand()
	public function randKey($count) {
      return bin2hex(openssl_random_pseudo_bytes($count));
   }

   public function randIv() {
      return base64_encode(openssl_random_pseudo_bytes(10));
   }
	*/

	/**
	 * ESTO YA ES PARA EL TEST, SE PUEDE BORRAR
	*/
	public function getMethodPost(string $method = '', ?string $value = null): string {
		$value = match($method) {
			'bytes' => (empty($value) ? $this->bytes : $value),
			'encrypt' => (empty($value) ? 'No hay texto aplicado' : $value),
		};
		return (isset($_POST[$method]) && !empty($_POST[$method])) ? $_POST[$method] : $value;
	}

	/**
	 * Una manera más practica, para el ejemplo
	 * @link https://www.php.net/manual/es/control-structures.match.php
	 */
	public function getRand(string $type = '', int $bytes = 0) {
		$bytes = ($bytes === 0 || empty($bytes)) ? $this->bytes : $bytes;
		return match($type) {
			'bin2hex' => bin2hex($this->randomPseudoBytes($bytes)),
			'encode' => base64_encode($this->randomPseudoBytes(10)),
			default => null,
		};
	}

}