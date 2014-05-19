<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {0:24}
 */

namespace Amulet\Controllers;


use Amulet\App;
use Amulet\Controller;
use Amulet\Entity\Account;
use Amulet\Factory\Config\SystemConfig;
use Amulet\Service\AccountService;
use Amulet\Service\AuthService;

class AutentificatedController extends Controller
{
    /** @var  Account */
    protected $account;
    /** @var  AccountService */
    protected $_accountService;
    /** @var  AuthService */
    protected $_authService;

    public function render($template, $data = [])
    {
        $data["account"] = $this->account;
        parent::render($template, $data);
    }

    protected function before()
    {
        parent::before();
        $this->_accountService = $this->get("account_service");
        /** @var $systemConfig SystemConfig */
        $systemConfig = App::init()->configFactory("system");
        $this->_authService = $this->get("auth_service");
        $sig = $this->request->cookies->get($systemConfig->getCookieName(), null);
        if(!is_null($sig))
        {
            $account = $this->_authService->getAccount($sig);
            if(false !== $account)
            {
                $this->account = $account;
            } else {
                $this->_redirectToLogin();
            }
        } else {
            $this->_redirectToLogin();
        }
    }

    private function _redirectToLogin()
    {
        $this->redirect(
            $this->generateUrl("login", ["ext" => "html"])
        );
    }

    public function after()
    {
        parent::after();
    }
} 