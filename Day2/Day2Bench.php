<?php

require_once "Day2.php";

class Day2Bench
{
    public $day2;

    public function __construct()
    {
        $this->day2 = new Day2;
    }

    public function benchPart1()
    {
        $this->day2->part1();
    }

    public function benchPart2()
    {
        $this->day2->part2();
    }
}