<?php
namespace mvc\web;


class Controller
{
  public function render($view, $params=[])
  {
    extract($params);
    ob_start();
    require realpath(__DIR__ . '/../../../../app/views/'.$view.'.php');
    $content = ob_get_clean();

    require realpath(__DIR__ . '/../../../../app/views/layouts/main.php');
  }
}
