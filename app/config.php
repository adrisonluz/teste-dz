<?php
  if($_SERVER['HTTP_HOST'] == 'localhost'){
    $getUrl = explode('/',$_SERVER['REQUEST_URI']);
    define("__BASE__", 'http://' . $_SERVER['SERVER_NAME'] . '/' . $getUrl[1] . '/');
  }else{
    define("__BASE__", 'http://' . $_SERVER['SERVER_NAME'] . '/');
  }

  define("__LAYOUT__", 'page/layout.php');

  require_once 'app/controller.php';
  require_once 'app/session.php';
