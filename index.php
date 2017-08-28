<?php
include('inc/config.php');
include ('Questions.php');

session_start();

$q_answer = isset($_POST['q_answer']) ? $_POST['q_answer'] : null;
$q_id = isset($_POST['q_id']) ? $_POST['q_id'] : null;

if(@$_SESSION['start'] == false){
    $_SESSION['start'] = isset($_POST['start']) ? $_POST['start'] : false;
}

if($_SESSION['start']){
    $q = new Questions($questions, $series);

    if( !is_null($q_answer) && !is_null($q_id) ){
        $q->setAnswer($q_id, $q_answer);
    }

    $question = $q->getNextQuestion();

    if(!$question){
        $result = $q->getResult();
        $_SESSION['answers'] = null;
        include ('views/result.php');
    }else{
        include ('views/quiz.php');
    }
}else{
    include ('views/start.php');
}
