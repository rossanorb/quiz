<?php
include('inc/questions.php');
include ('Questions.php');

$q_answer = isset($_POST['q_answer']) ? $_POST['q_answer'] : null;
$q_id = isset($_POST['q_id']) ? $_POST['q_id'] : null;

$q = new Questions($questions);

if( !is_null($q_answer) && !is_null($q_id) ){
    $q->setAnswer($q_id, $q_answer);
}

$question = $q->getNextQuestion();




include ('views/quiz.php');


//$pergunta = @$_SESSION["question"] ?: 0 ;
//$pergunta++;
//$_SESSION["question"] = $pergunta;
//echo $pergunta;






