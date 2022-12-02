<?php

class Day2
{
    public $f;
    public $p1;
    public $p2;
    public $values;
    public $score;
    public $conv;
    public function __construct()
    {
        //$this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
        $this->p1 = array("X" => 1, "Y" => 2, "Z" => 3);
        $this->p2 = array("A" => 1, "B" => 2, "C" => 3);
        $this->score = array(0 => 3, -1 => 6, 2 => 6, 1 => 0, -2 => 0);
        $this->conv = array(
            "X" => array(1 => 3, 2 => 1, 3 => 2),
            "Y" => array(1 => 1, 2 => 2, 3 => 3),
            "Z" => array(1 => 2, 3 => 1, 2 => 3)
        );
        $f = fopen(dirname(__FILE__). "/i.txt", "r");
        while($x = fgets($f)){
            $this->f[] =  $x;
        }
    }

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