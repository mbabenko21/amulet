<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {17:31}
 */

namespace Amulet;


use Amulet\Service\CryptoService;

class Cipher implements CryptoService {
    private $securekey, $iv;
    public function __construct($textkey) {
        $this->securekey = hash('sha256',$textkey,TRUE);
        $this->iv = mcrypt_create_iv(32);
    }

    /**
     * @param $input
     * @return string
     */
    public function encrypt($input) {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $this->iv));
    }

    /**
     * @param $input
     * @return string
     */
    public function decrypt($input) {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->securekey, base64_decode($input), MCRYPT_MODE_ECB, $this->iv));
    }

    /**
     * @param string $text
     * @param string $signatute
     * @return bool
     */
    public function verify($text, $signatute)
    {
        return $this->encrypt($text) == $signatute;
    }
}