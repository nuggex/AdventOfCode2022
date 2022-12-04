<?php

require_once "Day4.php";

class Day4Bench
{
    public Day4 $day4;

    public function __construct()
    {
        $this->day4 = new Day4;
    }

    public function benchPart1()
    {
        $this->day4->part1();
    }

    public function benchPart2()
    {
        $this->day4->part2();
    }
}