<?php

class Day2
{
    public $f;
    public $p1;
    public $p2;
    public $values;
    public $score;
    public $conv;
    public $pa1;
    public $pa2;
    public function __construct()
    {
       $this->pa1 = array(
            "A X" => 4,
            "A Y" => 8,
            "A Z" => 3,
            "B X" => 1,
            "B Y" => 5,
            "B Z" => 9,
            "C X" => 7,
            "C Y" => 2,
            "C Z" => 6
        );

        $this->pa2 = array(
            "A X" => 3,
            "A Y" => 4,
            "A Z" => 8,
            "B X" => 1,
            "B Y" => 5,
            "B Z" => 9,
            "C X" => 2,
            "C Y" => 6,
            "C Z" => 7
        );
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
}
    public function part1(){
        $temp = 0;
        foreach($this->f as $e){
            $temp += $this->pa1[$e];
        }
        return ($temp);
    }

    public function part2(){
        $temp = 0;
        foreach($this->f as $e){
            $temp += $this->pa2[$e];
        }
        return ($temp);
    }
}
/*
    public function part1()
    {
        $temp = 0;
        foreach ($this->f as $e) {
            $temp += $this->score[$this->p2[$e[0]] - ($p1 = $this->p1[$e[2]])] + $p1;
        }
        return $temp;
    }

    public function part2()
    {
        $temp = 0;
        foreach ($this->f as $e) {
            $temp += $this->score[($p1Value = $this->p2[$e[0]]) - ($val = $this->conv[$e[2]][$p1Value])] + $val;
        }
        return $temp;
    }
}
*/
