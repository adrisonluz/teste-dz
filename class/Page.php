<?php

/**
 * Page
 */
class Page
{
  public $layout = __LAYOUT__;
  public $etapaAtual = '';

  public function __call($name, $arguments){
    return header('Location: ' . __BASE__ . 'page/error' . $arguments);
  }

  public function setHtml($path)
  {
    if(file_exists($path)){
        $pageContent = file_get_contents($path);
    }else{
        $pageContent = file_get_contents('page/error.php');
    }

    $url = explode('/',str_replace('.php','',$path));
    $_SESSION['etapa'] = $url[1];
    return include $this->layout;
  }

  public function inicio()
  {
    if(!isset($_SESSION['quiz'])){
      $_SESSION['quiz']['atual'] = 'inicio';
    }

    $this->setHtml('page/inicio.php');
  }

  public function etapa1()
  {
    $this->setHtml('page/etapa-1.php');
  }

  public function etapa2()
  {
    $this->setHtml('page/etapa-2.php');
  }

  public function etapa3()
  {
    $this->setHtml('page/etapa-3.php');
  }

  public function etapa4()
  {
    $this->setHtml('page/etapa-4.php');
  }

  public function etapa5()
  {
    $this->setHtml('page/etapa-5.php');
  }

  public function fim()
  {
    $this->setHtml('page/fim.php');
  }

  public function error()
  {
    $this->setHtml('page/error.php');
  }
}
