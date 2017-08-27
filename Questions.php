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

    private function scramble_answers($list){
        $keys = array_keys($list);
        shuffle($keys);
        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }
        return $random;
    }

    public function getNextQuestion(){

        if(!@$_SESSION['answers']){
            $_SESSION['answers'] = [1 => "",2 => "",3 => "",4 => "",5 => ""];
            $questions = $this->questions[1];
            $questions[2] = $this->scramble_answers($questions[2]);
            return $questions;
        }else{
            foreach ($_SESSION['answers'] as $ind => $answer){
                if(!$answer){
                    $questions = $this->questions[$ind];
                    $questions[2] = $this->scramble_answers($questions[2]);
                    return $questions;
                }
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