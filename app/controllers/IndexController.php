<?php
namespace controllers;

use models\Serveur;
use PHPMV\ProxmoxApi;
use PHPMV\ProxmoxMaster;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\core\postinstall\Display;
use Ubiquity\log\Logger;
use Ubiquity\orm\DAO;
use Ubiquity\themes\ThemesManager;

/**
 * Controller IndexController
 */
class IndexController extends ControllerBase {
    use WithAuthTrait;
    protected function getAuthController(): AuthController {
        return new BasicAuthController($this);
    }
	public function index() {
		/* $defaultPage = Display::getDefaultPage();
		$links = Display::getLinks();
		$infos = Display::getPageInfos();

		$activeTheme = ThemesManager::getActiveTheme();
		$themes = Display::getThemes();
		if (\count($themes) > 0) {
			$this->loadView('@activeTheme/main/vMenu.html', \compact('themes', 'activeTheme'));
		}
		$this->loadView($defaultPage, \compact('defaultPage', 'links', 'infos', 'activeTheme'));*/
        $this->loadView("test.html");
	}

	public function ct($theme) {
		$themes = Display::getThemes();
		if ($theme != null && \array_search($theme, $themes) !== false) {
			$config = ThemesManager::saveActiveTheme($theme);
			\header('Location: ' . $config['siteUrl']);
		} else {
			Logger::warn('Themes', \sprintf('The theme %s does not exists!', $theme), 'changeTheme(ct)');
			$this->forward(IndexController::class);
		}
	}
    #[Route('vms')]
    public function vms(){
        $server=DAO::getById(Serveur::class,1);
        $proxmox=new ProxmoxApi($server->getIpAddress(),$server->getLogin(),$server->getPassword());
        $vms=$proxmox->getVMs();
        $dt=$this->jquery->semantic()->dataTable('dt-vms',\stdClass::class,$vms);
        $dt->setFields(ProxmoxMaster::VM_FIELDS);
        $dt->setHasCheckboxes(true);
        $this->jquery->renderDefaultView();

    }
}
