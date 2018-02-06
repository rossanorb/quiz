<?php

class Questions{

    private $questions = [];
    private $series = [];

    public function __construct(array $questions, array  $series){
        $this->questions = $questions;
        $this->series = $series;
    }

    public function setAnswer($ind, $value){
        $_SESSION['answers'][$ind] = $value;
    }

    private function scrambleAnswers($list){
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
            $questions[2] = $this->scrambleAnswers($questions[2]);
            return $questions;
        }else{
            foreach ($_SESSION['answers'] as $ind => $answer){
                if(!$answer){
                    $questions = $this->questions[$ind];
                    $questions[2] = $this->scrambleAnswers($questions[2]);
                    return $questions;
                }
            }
        }
    }

    public function getResult(){
        $answers = array_count_values($_SESSION['answers']);
        $max = max($answers);
        $answers = array_filter($answers, function($var) use ($max){
            return ($max == $var);
        });

        ksort($answers);
        $answers = array_reverse($answers);
        return ($this->series[key($answers)]);
    }

}