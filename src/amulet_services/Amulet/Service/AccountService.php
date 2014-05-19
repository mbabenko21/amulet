<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {14:51}
 */

namespace Amulet\Service;


use Amulet\Entity\Account;

interface AccountService {
    const DEFAULT_ROLE = 1;
    const ADMIN_ROLE = 2;
    /**
     * @param array $data
     * @return Account
     */
    public function createFromData($data = []);

    /**
     * @param Account $account
     * @param $password
     * @return mixed
     */
    public function verifyPassword(Account $account, $password);


    /**
     * @param Account $account
     * @return void
     */
    public function persist(Account $account);

    /**
     * @param Account $account
     * @return void
     */
    public function remove(Account $account);

    /**
     * @return AccountRepository
     */
    public function getRepository();
} 