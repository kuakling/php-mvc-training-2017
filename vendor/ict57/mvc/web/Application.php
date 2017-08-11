<?php
namespace mvc\web;

use Mvc;

class Application {

  public $config;

  function __construct($config)
  {
    $this->config = $config;
  }
  public function run()
  {
    session_start();

    $r = (array_key_exists('r', $_GET)) ? rtrim($_GET['r'], '/') : 'site/index';
    $appDir = realpath(__DIR__.'/../../../../app');
    $exp = explode('/', $r);

    // Mvc::$app->route = $exp;

    $moduleWorkSpace = '';
    $moduleClassName = 'mvc\web\Module';
    if(array_key_exists($exp[0], $this->config['modules'])){
      $moduleClassName = $this->config['modules'][$exp[0]]['class'];

      $appDir .= '/modules/'.$this->config['modules'][$exp[0]]['workspace'];
      $moduleWorkSpace= 'modules\\'.$this->config['modules'][$exp[0]]['workspace'].'\\';
      Mvc::$app->route['module'] = $exp[0];
      unset($exp[0]);
      $exp = array_values($exp);
    }

    $ctrlName = ucfirst($exp[0]);
    Mvc::$app->route['controller'] = $exp[0];
    $methName = (isset($exp[1])) ? $exp[1] : 'index';
    Mvc::$app->route['action'] = $exp[1];
    $actionName = 'action'.ucfirst($methName);

    $controllerNamespace = 'app\\'.$moduleWorkSpace.'controllers\\'.$ctrlName.'Controller';

    $moduleClass = new $moduleClassName([
      'loader' => [$controllerNamespace, $actionName, $_GET]
    ]);

    try{
      if(class_exists($controllerNamespace)){
        $controller = new $controllerNamespace();
        if(method_exists($controller, $actionName)){
          unset($_GET['r']);
          call_user_func_array([$controller, $actionName], $_GET);
        }else{
          throw new \Exception('404 Method not found.');
        }
      }else{
        throw new \Exception('404 Controller not found.');
      }
    }catch(\Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }

  }
}
?>
