<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {19:26}
 */

namespace Amulet\Service;


interface AuthService {
    /**
     * @param string $username
     * @param string $password
     * @return string [token]
     */
    public function login($username, $password);

    /**
     * @return void
     */
    public function logout();

    /**
     * @return bool
     */
    public function hasLogin();
} 