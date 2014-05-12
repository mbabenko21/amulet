<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {22:43}
 */

namespace Amulet\Repository;


use Amulet\Entity\Account;
use Amulet\Service\AccountRepository;

class AccountRepositoryImpl extends AmuletRepository implements AccountRepository{

    /**
     * @param string $email
     * @return Account
     */
    public function findByEmail($email)
    {
        $criteria = [
            "username" => $email
        ];
        $account = $this->findOneBy($criteria);
        $eq = $this->equals($account, "Amulet\\Entity\\Account", true);
        return $account;
    }
}