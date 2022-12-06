<?php

require_once "Day5.php";

class Day5Bench
{
    public Day5 $Day5;

    public function __construct()
    {
        $this->Day5 = new Day5;
    }

    public function benchPart1()
    {
        $this->Day5->Part1();
    }

    public function benchPart2()
    {
        $this->Day5->Part2();
    }
}

