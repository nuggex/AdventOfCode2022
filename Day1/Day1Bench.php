<?php

use JetBrains\PhpStorm\Pure;

require_once "Day1.php";

class Day1Bench
{
    public Day1 $Day1;

    #[Pure] public function __construct()
    {
        $this->Day1 = new Day1;
    }

    public function benchPart1()
    {
        $this->Day1->part1();
    }

}