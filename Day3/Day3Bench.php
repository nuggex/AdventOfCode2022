<?php

require_once "Day3.php";

class Day3Bench
{
    public Day3 $day3;

    public function __construct()
    {
        $this->day3 = new Day3;
    }

    public function benchPart1()
    {
        $this->day3->part1();
    }

    public function benchPart2()
    {
        $this->day3->part2();
    }
}