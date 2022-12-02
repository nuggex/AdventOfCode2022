<?php

class Day2
{

    public $f;
    public $p1;
    public $p2;
    public $values;
    public $score;
    public $loses;
    public $wins;
    public $draw;
    public $condition;
    public $playerScore;
    public $scoresPart2;
    public $k;
    public function __construct()
    {
        $this->f = file("i.txt");
        $this->p1 = array("A" => "Rock", "B" => "Paper", "C" => "Scissors");
        $this->p2 = array("X" => "Rock", "Y" => "Paper", "Z" => "Scissors");
        $this->values = array("Rock" => 1, "Paper" => 2, "Scissors" => 3);
        $this->score = array(0 => 3, -1 => 6, 2 => 6, 1 => 0, -2 => 0);
        $this->condition = array(
            "X" => array("Rock" => "Scissors", "Paper" => "Rock", "Scissors" => "Paper"),
            "Y" => array("Rock" => "Rock", "Scissors" => "Scissors", "Paper" => "Paper"),
            "Z" => array("Rock" => "Paper", "Scissors" => "Rock", "Paper" => "Scissors"));
        $this->playerScore = 0;
        $this->scoresPart2 = 0;
        foreach($this->f as $e){
            $temp =  explode(" ", $e);
            $temp[1] = rtrim($temp[1]);
            $this->k[] = $temp;

        }
    }


    public function part1()
    {
        foreach ($this->k as $t) {
            $result = $this->values[$this->p1[$t[0]]] - $this->values[$this->p2[$t[1]]];
            $this->playerScore += $this->score[$result] + $this->values[$this->p2[$t[1]]];
        }
        return $this->playerScore;

    }

    public function part2()
    {
        foreach ($this->k as $t) {
            $move = $this->condition[$t[1]];
            $p1Select = $this->p1[$t[0]];
            $player1 = $this->values[$p1Select];
            $player2 = $this->values[$move[$p1Select]];
            $this->scoresPart2 += $this->score[$player1 - $player2] + $this->values[$move[$p1Select]];
        }
        return $this->scoresPart2;
    }

}