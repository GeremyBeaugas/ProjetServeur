<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
 * Class TestCrudOrgasFiles
 **/
class TestCrudOrgasFiles extends CRUDFiles{
	public function getViewIndex(): string {
		return "TestCrudOrgas/index.html";
	}

	public function getViewForm(): string {
		return "TestCrudOrgas/form.html";
	}

	public function getViewDisplay(): string {
		return "TestCrudOrgas/display.html";
	}

}
