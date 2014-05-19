<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {19:26}
 */

namespace Amulet\Service;


use Amulet\Entity\Account;
use Symfony\Component\HttpFoundation\Cookie;

interface AuthService {
    /**
     * @param string $username
     * @param string $password
     * @return Account
     */
    public function login($username, $password);

    /**
     * @param string $sid
     * @return bool
     */
    public function logout($sid);

    /**
     * @param string $sid
     * @return bool
     * @deprecated
     */
    public function hasLogin($sid);

    /**
     *
     * @param string $sid
     * @return Account
     */
    public function getAccount($sid);

    /**
     * Создание данных для COOKIES
     * @param Account $account
     * @param bool $remember
     * @return Cookie
     */
    public function createCookie(Account $account, $remember = true);
} 