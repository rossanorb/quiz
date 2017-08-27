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
    echo $result;
    session_destroy();
    die();
    //header("Location: index.php");
}




include ('views/quiz.php');


//$pergunta = @$_SESSION["question"] ?: 0 ;
//$pergunta++;
//$_SESSION["question"] = $pergunta;
//echo $pergunta;






