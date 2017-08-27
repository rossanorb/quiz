<?php

class Questions{

    private $questions = [];
    private $id;

    public function __construct(array $questions){
        session_start();
        $this->questions = $questions;
    }

    public function setAnswer($ind, $value){

        $_SESSION['answers'][$ind] = $value;
    }

    public function getNextQuestion(){

        if(!@$_SESSION['answers']){
            $_SESSION['answers'] = [1 => "",2 => "",3 => "",4 => "",5 => ""];
            return $this->questions[1];
        }else{
            foreach ($_SESSION['answers'] as $ind => $answer){
                if(!$answer) return $this->questions[$ind];
            }

            echo "<pre>";
            print_r($_SESSION['answers']);
            echo "</pre>";
            session_destroy();
            //die();
            header("Location: index.php");
        }
    }

}