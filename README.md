
# CrypX - Encryption system
Library for encryption and decryption of strings or integers, based on PHP
> Based on the openssl library

It is a simple library that allows you to encrypt and decrypt strings or integers

## How can i Use
<p>First you need to create an object of the class CrypX</p>
<p>Then you can use the methods of the class</p>
<p>Example:</p>
<pre><code>
    require_once realpath(__DIR__) .  DIRECTORY_SEPARATOR . 'lib.php';
    $CrypX = new CrypX;
    $key = $CrypX->getRand('bin2hex', 16);
    $iv = $CrypX->getRand('encode');
    $encrypted = $CrypX->encrypt("Library for encryption and decryption of strings or integers, based on PHP",$key,$iv);
    $decrypt = $CrypX->decrypt($encriptado,$key,$iv);
</code></pre>

**It is important to keep the key and iv to decrypt the data**

---

## Explain
 - **randKey**: Its agenerates a random key with the required bytes
 - **randIv**: Its agenerates a random iv
 - **encrypt**: It encrypts the data with the key and iv
 - **decrypt**: It decrypts the data with the key and iv
### By Aexstudios | Update Miguel92

![capture_one](https://cdn.discordapp.com/attachments/1196583376023470082/1279075181096337508/image.png?ex=66d31f17&is=66d1cd97&hm=7ad9040632ff57b2118bdc905df19449f436bbbb7bd37dbe218c30c5be30d24e&)

![capture_two](https://cdn.discordapp.com/attachments/1196583376023470082/1279075181540806666/image.png?ex=66d31f17&is=66d1cd97&hm=fb81d14e4dfa60bac6b4fe6d4de1f6380ba24e76c77cd3838a1e224baf8f194e&)