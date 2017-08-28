<?php
include('inc/config.php');
include ('Questions.php');

$q_answer = isset($_POST['q_answer']) ? $_POST['q_answer'] : null;
$q_id = isset($_POST['q_id']) ? $_POST['q_id'] : null;

$q = new Questions($questions, $series);

if( !is_null($q_answer) && !is_null($q_id) ){
    $q->setAnswer($q_id, $q_answer);
}

$question = $q->getNextQuestion();

if(!$question){
    $result = $q->getResult();    
    session_destroy();
    include ('views/result.php');
}else{
    include ('views/quiz.php');    
}