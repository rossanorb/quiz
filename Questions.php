<?php

class Questions{

    private $questions = [];

    public function __construct(array $questions){
        $this->questions = $questions;
    }

    public function getNextQuestion(){
        session_start();
        if(!@$_SESSION['answers']){
            $_SESSION['answers'] = [1 => "",2 => "",3 => "",4 => "",5 => ""];
            return $this->questions[1];
        }else{
            //$_SESSION['answers'][1] = 'a';
            foreach ($_SESSION['answers'] as $ind => $answer){
                if(!$answer) return $this->questions[$ind];
            }
        }
    }

}