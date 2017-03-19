<?php

/**
 * Session
 */
class Session
{
  public function check($url){
      if(!isset($_SESSION['quiz'])){
          $_SESSION['quiz']['atual'] = 'inicio';
      }

      $session = $_SESSION['quiz'];
      if($url !== $session['atual'] && $url !== 'error'){
        $_SESSION['msg'] = 'Por favor, continue de onde você parou.';
        header('Location: ' . __BASE__ . 'page/' . $session['atual']);
      }
  }
}
