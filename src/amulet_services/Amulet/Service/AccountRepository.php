<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {22:43}
 */

namespace Amulet\Service;


use Amulet\Entity\Account;
use Doctrine\Common\Persistence\ObjectRepository;

interface AccountRepository extends ObjectRepository {
    /**
     * Поиск аккаунта
     * @param string $username
     * @return Account
     */
    public function findByUsername($username);

    /**
     * @param string $token
     * @return Account
     */
    public function findByToken($token);
    /**
     * @return \ArrayIterator
     */
    public function getGameMasters();
} 