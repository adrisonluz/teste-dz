<?php

/**
 * Controller
 */
class Controller
{
  public $controller;
  public $action = '';
  public $url;

  public function __construct() {
    // Se url for vazia retorna pagina inicial
    if(!isset($_GET['url']))
      header('Location: ' . __BASE__ . 'page/inicio');

    // Verifica a página atual
    $url = (!empty($_GET['url']) ? $_GET['url'] : 'page/inicio');

    // Invoca classe e método equivalente
    $arrayUrl = explode('/' , $url);
    if(empty($arrayUrl[1]))
        header('Location: ' . __BASE__ . 'page/error');

    $this->url = $url;
    $this->setController($arrayUrl[0]);

    if(!empty($arrayUrl[1]))
        $this->setAction($arrayUrl[1]);
  }

  public function setController($controller)
  {
    $this->controller = $controller;
  }

  public function setAction($action)
  {
    $this->action = $action;
  }

  public function init()
  {
    $controller = ucfirst($this->controller);
    require_once 'class/' . $controller . '.php';

    $return = new $controller();
    if($this->action !== ''){
      $action = $this->action;
      $return->$action();
    }
  }

  public function getUrl(){
      return $this->url;
  }
}
