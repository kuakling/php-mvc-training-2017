<?php
namespace mvc\web;

use Mvc;

class Controller
{
	public $title='';

	public $usedRender = false;

  public function render($view, $params=[])
  {
		$className = get_class($this);
		$reflect = new \ReflectionClass($className);
		$shortName = $reflect->getShortName();
		$viewFolder = lcfirst(substr($shortName, 0, -10));
		$viewPath = realpath(dirname($reflect->getFileName()).'/../').DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$viewFolder;
		$viewFile = $viewPath.DIRECTORY_SEPARATOR.$view.'.php';
		$layoutFile = Mvc::$app->layoutPath.DIRECTORY_SEPARATOR.Mvc::$app->layoutFile.'.php';

		// echo __FILE__.' '.Mvc::$app->layoutPath.'<br />';

		if(is_file($viewFile)){
	    extract($params);
	    ob_start();
			require $viewFile;
	    $content = ob_get_clean();

	    // require realpath(__DIR__ . '/../../../../app/views/layouts/main.php');
			if($this->usedRender){
				echo $content;
			}else{
				$this->usedRender = true;
				include($layoutFile);
			}
		}else{
			echo 'ไม่มีไฟล์ '.$viewFile;
			header('Status: 500', TRUE, 500);
		}
  }

  public function beginPage()
  {

  }

  public function head()
  {

  }

  public function beginBody()
  {

  }

  public function endBody()
  {

  }

  public function endPage()
  {

  }
}
