<?php
namespace mvc\web;

class Application {

  function __construct($config)
  {
    
  }
  public function run()
  {
    $r = (array_key_exists('r', $_GET)) ? rtrim($_GET['r'], '/') : 'site/index';
    $exp = explode('/', $r);

    $ctrlName = ucfirst($exp[0]);
    $methName = (isset($exp[1])) ? $exp[1] : 'index';

    $appDir = realpath(__DIR__.'/../../../../app');
    $controllerFile = $appDir.'/controllers/'.$ctrlName.'Controller.php';

    $controllerNamespace = 'app\controllers\\'.$ctrlName.'Controller';
    try{
      if(file_exists($controllerFile)){
        $controller = new $controllerNamespace;
        if(method_exists($controller, $methName)){
          unset($_GET['r']);
          call_user_func_array([$controller, $methName], $_GET);
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
