<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 13.05.14 - {23:36}
 */

namespace Amulet\Service;


use Amulet\App;
use Amulet\Entity\Account;
use Amulet\Exception\AmuletException;
use Amulet\Exception\EntityRepositoryException;
use Amulet\Factory\Config\SystemConfig;
use Symfony\Component\HttpFoundation\Cookie;

class AuthServiceImpl implements AuthService {
    /** @var  AccountService */
    protected $_accountService;
    /** @var  CryptoService */
    protected $_crypto;

    /**
     * @param string $username
     * @param string $password
     * @throws \Amulet\Exception\AmuletException
     * @return Account
     */
    public function login($username, $password)
    {
        try{
            $account = $this->_accountService->getRepository()->findByUsername($username);
            if($this->_accountService->verifyPassword($account, $password)){
                $this->_createUniqueSignature($account);
                $this->_accountService->persist($account);
                return $account;
            } else {
                throw new AmuletException(
                    sprintf("password_wrong")
                );
            }
        } catch(EntityRepositoryException $e)
        {
            throw new AmuletException(
                sprintf("account_not_exists")
            );
        }
    }

    /**
     * @param string $sid
     * @return bool
     */
    public function logout($sid)
    {
        try{
            $account = $this->_accountService->getRepository()->findByToken($sid);
            $account->setCookid(null);
            return true;
        } catch(EntityRepositoryException $e)
        {
            return false;
        }
    }

    /**
     * @param string $sid
     * @return bool
     * @deprecated
     */
    public function hasLogin($sid)
    {
        try{
            $account = $this->_accountService->getRepository()->findByToken($sid);
            return true;
        } catch(EntityRepositoryException $e)
        {
            return false;
        }
    }

    /**
     *
     * @param string $sid
     * @return Account
     */
    public function getAccount($sid)
    {
        try{
            $account = $this->_accountService->getRepository()->findByToken($sid);
            return $account;
        } catch(EntityRepositoryException $e)
        {
            return false;
        }
    }

    /**
     * @param \Amulet\Service\AccountService $accountService
     */
    public function setAccountService(AccountService $accountService)
    {
        $this->_accountService = $accountService;
    }

    /**
     * @param \Amulet\Service\CryptoService $crypto
     */
    public function setCrypto($crypto)
    {
        $this->_crypto = $crypto;
    }

    /**
     * @param Account $account
     * @return \Amulet\Entity\Account
     */
    private function _createUniqueSignature(Account $account)
    {
        $sig = $this->_crypto->encrypt($account->getId(). "_" .$account->getUsername() . "_" . $account->getPassword()) . "_" . time() . "_" . mt_rand(0, 9999999);
        $account->setCookid(md5($sig));
        return $account;
    }

    /**
     * Создание данных для COOKIES
     * @param Account $account
     * @param bool $remember
     * @return Cookie
     */
    public function createCookie(Account $account, $remember = true)
    {
        /** @var $systemConfig SystemConfig */
        $systemConfig = App::init()->configFactory("system");
        $expire = (true === $remember) ? 3600 * 24 * 30 : 0;
        $cookie = new Cookie($systemConfig->getCookieName(), $account->getCookid(), time() + $expire, "/");

        return $cookie;
    }
}