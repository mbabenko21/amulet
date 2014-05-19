<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {21:19}
 */

namespace AmuletOfDragon\Controller;


use Amulet\App;
use Amulet\Controller;
use Amulet\Exception\AccountServiceException;
use Amulet\Exception\EntityRepositoryException;
use Amulet\Factory\Config\SystemConfig;
use Amulet\Service\AccountService;
use Amulet\Service\AuthService;

/**
 * Class AuthController
 * @package AmuletOfDragon\Controller
 */
class AuthController extends Controller
{
    /** @var  AccountService */
    protected $accountService;
    /**
     * @var AuthService
     */
    protected $authService;

    public function loginAction()
    {
        $loginForm = $this->request->get("loginForm", []);
        if(count($loginForm) > 0)
        {
            /**
             * @var string $username
             * @var string $password
             */
            extract($loginForm);
            $account = $this->authService->login($username, $password);
            $cookie = $this->authService->createCookie($account);
            $this->response->headers->setCookie($cookie);
            $this->response->sendHeaders();
            $this->redirect(
                $this->generateUrl("home")
            );
        } else {
            $this->render("home");
        }
    }

    public function logoutAction()
    {
        /** @var $systemConfig SystemConfig */
        $systemConfig = App::init()->configFactory("system");
        $sig = $this->request->cookies->get($systemConfig->getCookieName(), null);
        if(!is_null($sig))
        {
            $account = $this->authService->logout($sig);
            $this->response->headers->clearCookie($systemConfig->getCookieName());
            $this->response->sendHeaders();
        }
        $this->redirect($this->generateUrl("home"));
    }
    /**
     * @param string $ext .html|.php
     */
    public function registrationAction($ext)
    {
        $regData = $this->request->get("regForm", []);
        if (count($regData) < 1) {
            $this->render("reg");
        } else {
            try {
                $account = $this->accountService->createFromData($regData);
            } catch (AccountServiceException $e) {
                $this->render("reg", [
                    "error" => $e->getMessage()
                ]);
            }
        }
        $this->render("reg");
    }

    public function createTestAccountAction()
    {
        $regData = [
            "username" => "mbabenko21@gmail.com",
            "password" => "123123"
        ];
        $this->accountService->createFromData($regData);
        $this->redirect(
            $this->generateUrl("login", ["ext" => "html"])
        );
    }
    protected function before()
    {
        parent::before();
        $this->accountService = $this->get("account_service");
        $this->authService = $this->get("auth_service");
    }

} 