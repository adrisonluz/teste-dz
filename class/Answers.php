<?php

/**
 * Answers
 */
class Answers
{
  // Inicia o quiz
  public function start(){
    $_SESSION['quiz']['atual'] = 'etapa1';
  }

  // Limpa os dados registradis e reinicia o quiz
  public function restart(){
    session_destroy();
    $_SESSION['quiz']['atual'] = 'inicio';
  }

  // Calcula os dados e retorna o resultado
  public function finish(){
    $quiz = $_SESSION['quiz'];

    $answers = [
      'hoc' => 0,
      'got' => 0,
      'los' => 0,
      'bkb' => 0,
      'slv' => 0
    ];

    foreach ($quiz['ans'] as $key => $code) {
      $answers[$code] = ($answers[$code] + $this->getVal($key));
    }

    $result = array_search(max($answers),$answers);
    $return = require('result/' . $result . '.php');
    echo json_encode($return);
    die;
  }

  // Busca respostas cadastradas
  public function get(){
    $etapa = $_POST['etapa'];

    // Inclui respostas de acordo com a etapa
    $answersArray = include 'answers/' . $etapa . '.php';

    // Randomiza as respostas
    shuffle($answersArray);

    // Prepara o array de retorno e garante que será a mesma chave do array da sessão
    foreach($answersArray as $answer){
      $answersReturn[$answer['code']] = $answer['msg'];
    }

    // Retorna as respostas em JSON
    echo json_encode($answersReturn);
    die;
  }

  // Registra a resposta
  public function set(){
    $return['msg'] = '';

    if(!isset($_POST['answer'])){
      $return['msg'] = 'Por favor, escolha uma opção.';
    }else{
      $etapa = $_POST['etapa'];
      $answer = $_POST['answer'];

      $nextEtapa = ($etapa == 5 ? 'fim' : 'etapa' . ($etapa + 1));

      $_SESSION['quiz']['ans'][$etapa] = $answer;
      $_SESSION['quiz']['atual'] = $nextEtapa;
    }

    echo json_encode($return);
    die;
  }

  // Garante que não dê impate e que 3 resostas valem mais que 2
  public function getVal($val){
    $valArray = [
      1 => 10,
      2 => 11,
      3 => 12,
      4 => 13,
      5 => 14
    ];

    return $valArray[$val];
  }
}
