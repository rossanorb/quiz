<?php
include('inc/questions.php');
include ('Questions.php');

$q = new Questions($questions);

//$q->setAnswer(1,'a');

$question = $q->getNextQuestion();




include ('views/quiz.php');


//$pergunta = @$_SESSION["question"] ?: 0 ;
//$pergunta++;
//$_SESSION["question"] = $pergunta;
//echo $pergunta;






