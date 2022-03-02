<?php
namespace controllers;

use models\User;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\Startup;
use Ubiquity\controllers\Auth\AuthFiles;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use controllers\auth\files\BasicAuthControllerFiles;

/**
 * Auth Controller BasicAuthController
 */
#[Route(path: "/connect",inherited: true,automated: true)]
class BasicAuthController extends \Ubiquity\controllers\auth\AuthController {

    protected function onConnect($connected) {
        $urlParts = $this->getOriginalURL();
        USession::set($this->_getUserSessionKey(), $connected);
        if (isset($urlParts)) {
            $this->_forward(implode("/", $urlParts));
        } else {
            Startup::forward("IndexController");
        }
    }

    protected function _connect() {
        if (URequest::isPost()) {
            $email = URequest::post($this->_getLoginInputName());
            $password = URequest::post($this->_getPasswordInputName());
            $user=DAO::getOne(User::class,'email= ?',[$email]);
            if($user!=null){
                if(URequest::password_verify($this->_getPasswordInputName(),$user->getPassword())){
                    return $user;
                }
            }
        }
        return;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
     */
    public function _isValidUser($action = null):bool {
        return USession::exists($this->_getUserSessionKey());
    }

    public function _getBaseRoute():string {
        return 'BasicAuthController';
    }

    protected function getFiles(): AuthFiles {
        return new BasicAuthControllerFiles();
    }

    /**
     *
     * {@inheritdoc}
     * @see \Ubiquity\controllers\auth\AuthController::_getLoginInputName()
     */
    public function _getLoginInputName() :string{
        return "email";
    }

    public function _displayInfoAsString():bool {
        return false;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Ubiquity\controllers\auth\AuthController::_checkConnectionTimeout()
     */
    public function _checkConnectionTimeout() :int{
        return 10000;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Ubiquity\controllers\auth\AuthController::attemptsNumber()
     */
    protected function attemptsNumber() :int{
        return 3;
    }

    public function _getBodySelector() :string{
        return "#main-content";
    }

    protected function toCookie($connected) {
        return $connected;
    }

    protected function fromCookie($cookie) {
        return $cookie;
    }

    protected function initializeAuth() {
        if (! URequest::isAjax()) {
            $this->loadView("@activeTheme/main/vHeader.html");
        }
    }

    protected function finalizeAuth() {
        if (! URequest::isAjax()) {
            $this->loadView("@activeTheme/main/vFooter.html");
        }
    }

    protected function hasAccountCreation(): bool
    {
        return true;
    }
    protected function _newAccountCreationRule(string $accountName): ?bool
    {
        $count=DAO::count(User::class,'login= ?',[$accountName]);
        return $count==0;
    }

    protected function _create(string $login, string $password): ?bool {
        if(!DAO::exists(User::class,'login= ?',[$login])){
            $user=new User();
            $user->setLogin($login);
            URequest::setValuesToObject($user);//for the others params in the POST.
            $user->setPassword(\password_hash($password,PASSWORD_DEFAULT));
            return DAO::insert($user);
        }
        return false;
    }

}