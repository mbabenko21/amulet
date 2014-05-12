<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {22:43}
 */

namespace Amulet\Service;


use Amulet\Entity\Account;

interface AccountRepository {
    /**
     * @param string $email
     * @return Account
     */
    public function findByEmail($email);
} 