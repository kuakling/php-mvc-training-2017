<?php
namespace mvc\web;

use Mvc;

class Controller
{
	public $title='';

	public $usedRender = false;

	public $js = [];

	public $jsFile = [];

	public $css = [];

	public $cssFile = [];

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

	public function registerJs($key, $js='')
	{
		$this->js[$key] = $js;
	}

	public function registerJsFile($file)
	{
		$this->jsFile[] = $file;
	}

	public function registerCss($css='')
	{
		$this->css[] = $css;
	}

	public function registerCssFile($file)
	{
		$this->cssFile[] = $file;
	}

  public function beginPage()
  {

  }

  public function head()
  {
		foreach ($this->cssFile as $cssFile) {
			echo '<link href="'.$cssFile.'" rel="stylesheet">';
			echo "\n";
		}

		if(count($this->css) > 0){
			echo '<style>';
			$css = implode($this->css, "\n");
			echo $css;
			echo '</style>';
		}
  }

  public function beginBody()
  {

  }

  public function endBody()
  {
		foreach ($this->jsFile as $jsFile) {
			echo '<script src="'.$jsFile.'"></script>';
			echo "\n";
		}

		if(count($this->js) > 0){
			echo '<script type="text/javascript">';
			$js = implode($this->js, "\n");
			echo $js;
			echo '</script>';
		}
  }

  public function endPage()
  {

  }
}
