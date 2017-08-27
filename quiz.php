<?php
include('inc/questions.php');
include ('Questions.php');

$q = new Questions($questions);
$question = $q->getNextQuestion();


echo $question[0];



//$pergunta = @$_SESSION["question"] ?: 0 ;
//$pergunta++;
//$_SESSION["question"] = $pergunta;
//echo $pergunta;

echo "<pre>";
print_r($question[1]);
echo "</pre>";

include ('views/quiz.php');


