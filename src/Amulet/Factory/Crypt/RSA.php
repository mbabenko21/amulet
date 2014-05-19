<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {17:02}
 */

namespace Amulet\Factory\Crypt;


use Amulet\Service\CryptoService;

class RSA implements CryptoService {
    /** @var  \Crypt_RSA */
    protected $_cryptor;
    /** @var  string */
    protected $publicKey, $privateKey;

    public function __construct()
    {
        $this->_cryptor = new \Crypt_RSA();
        $key = $this->_cryptor->createKey(128);
        $this->publicKey = $key["publickey"];
        $this->privateKey = $key["privateKey"];
        //$this->_cryptor->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    }

    /**
     * @param $string
     * @return string
     */
    public function encrypt($string)
    {
        $this->_cryptor->loadKey($this->getPrivateKey());
        return utf8_encode($this->_cryptor->sign($string));
    }

    /**
     * @param $string
     * @return string
     */
    public function decrypt($string)
    {
        $this->_cryptor->loadKey($this->getPrivateKey());
        return $this->_cryptor->decrypt($string);
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $text
     * @param string $signatute
     * @return bool
     */
    public function verify($text, $signatute)
    {
        $this->_cryptor->loadKey($this->getPublicKey());
        return $this->_cryptor->verify($text, $signatute);
    }
}