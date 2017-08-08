<?php
namespace app\controllers;

class UserController {
  public function index()
  {
    echo 'Hello this is UserController จ้าาาา';
  }

  public function profile($fac)
  {
    echo 'My name is Surakit Choodet '.$fac;
  }
}
