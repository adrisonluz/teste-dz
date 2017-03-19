<?php
  session_start();

  // Chama as configurações da aplicação
  include 'app/config.php';

  $controller = new Controller();
  $controller->init();
  $url = $controller->getUrl();
  $urlArray = explode('/', $url);

  $session = new Session();
  $session->check($urlArray[1]);
