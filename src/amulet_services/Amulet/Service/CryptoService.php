<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {17:04}
 */

namespace Amulet\Service;


interface CryptoService {
    /**
     * @param $string
     * @return string
     */
    public function encrypt($string);

    /**
     * @param $string
     * @return string
     */
    public function decrypt($string);

    /**
     * @param string $text
     * @param string $signatute
     * @return bool
     */
    public function verify($text, $signatute);
} 