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
    public function findByUsername($email)
    {
        $criteria = [
            "username" => $email
        ];
        $account = $this->findOneBy($criteria);
        $eq = $this->equals($account, "Amulet\\Entity\\Account", true);
        return $account;
    }

    /**
     * @return \ArrayIterator
     */
    public function getGameMasters()
    {
        return new \ArrayIterator();
    }

    /**
     * @param string $token
     * @return Account
     */
    public function findByToken($token)
    {
        $criteria = [
            "cookid" => $token
        ];
        $account = $this->findOneBy($criteria);
        $this->_isAccount($account);
        return $account;
    }

    /**
     * @param $account
     * @return bool
     */
    private function _isAccount($account)
    {
        return $this->equals($account, "Amulet\\Entity\\Account", true);
    }
}