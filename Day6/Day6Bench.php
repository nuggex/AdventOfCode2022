<?php

require_once "Day6.php";

class Day6Bench
{
    public Day6 $Day6;

    public function __construct()
    {
        $this->Day6 = new Day6;
    }

    public function benchPart1()
    {
        $this->Day6->part1();
    }

    public function benchPart2()
    {
        $this->Day6->part2();
    }
}