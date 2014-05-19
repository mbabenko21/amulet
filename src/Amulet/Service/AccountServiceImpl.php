<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {15:22}
 */

namespace Amulet\Service;


use Amulet\Entity\Account;
use Amulet\Exception\AccountServiceException;
use Amulet\Exception\EntityRepositoryException;
use Amulet\Repository\AmuletRepository;
use Crypt_Rijndael;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Events;

class AccountServiceImpl implements AccountService, Repositoreble
{
    /** @var  EntityManagerInterface */
    protected $_em;
    /** @var  AccountRepository */
    protected $_repository;
    /** @var  Crypt_Rijndael */
    protected $_crypt;

    /**
     * @param array $data
     * @throws \Amulet\Exception\AccountServiceException
     * @return mixed
     */
    public function createFromData($data = [])
    {
        if ($this->_fixAccountData($data)) {
            try {
                $account = $this->_repository->findByUsername($data["username"]);
                throw new AccountServiceException(
                    sprintf(
                        "account_exists"
                    )
                );
            } catch (EntityRepositoryException $e) {
                $account = new Account();
                $password = $this->_crypt->encrypt($data["password"]);
                $account->setUsername($data["username"])
                    ->setPassword($password);
                $this->persist($account);
                return $account;
            }
        } else {
            throw new AccountServiceException(
                sprintf(
                    "data_invalid"
                )
            );
        }
    }


    /**
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function setEm($em)
    {
        $this->_em = $em;
        $this->_repository = $em->getRepository($this->getRepositoryClass());
    }

    /**
     * @return string
     */
    public function getRepositoryClass()
    {
        return "Amulet\\Entity\\Account";
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function _fixAccountData(array $data)
    {
        $diff = array_diff(
            array_keys($data),
            [
                "username",
                "password"
            ]
        );
        return count($diff) < 1;
    }

    /**
     * @param \Crypt_Rijndael $crypt
     */
    public function setCrypt($crypt)
    {
        $this->_crypt = $crypt;
    }

    /**
     * @param Account $account
     * @param $password
     * @return mixed
     */
    public function verifyPassword(Account $account, $password)
    {
        $password = $this->_crypt->encrypt($password);
        return $password == $account->getPassword();
    }

    /**
     * @param Account $account
     * @return void
     */
    public function persist(Account $account)
    {
        $this->_em->persist($account->getOptions());
        $this->_em->persist($account);
        $this->_em->flush();
    }

    /**
     * @param Account $account
     * @return void
     */
    public function remove(Account $account)
    {
        $this->_em->remove($account);
        $this->_em->flush();
    }

    /**
     * @return \Amulet\Service\AccountRepository
     */
    public function getRepository()
    {
        return $this->_repository;
    }
}