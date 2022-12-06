<?php
/**
 * Advent of Code multi run benchmarking
 * Benchmarked on Ryzen Threadripper 2950X
 * 10k runs average 90us / run
 * PHP 8.1.12
 */

class Day1
{
    function Part1()
    {
        $x = 0;
        $runs = array(1, 10000, 100000);
        foreach ($runs as $run) {
            $f = file(dirname(__FILE__) ."/i.txt");

            $t = microtime(true);
            while ($x < $run) {
                $e = [];
                $sum = 0;
                foreach ($f as $v) {
                    if ($v != "\n") {
                        $sum += $v;
                        continue;
                    }
                    $e[$sum] = $sum;
                    $sum = 0;
                }
                $top1 = max($e);
                $e[$top1] = 0;
                $top2 = max($e);
                $e[$top2] = 0;
                $top3 = max($e);
                $top = $top1 + $top2 + $top3;
                $x++;
            }
            $runtime = (microtime(true) - $t) / $run;
            return "Most calories: $top1 \nTop 3 total:  $top \n$run run average per run : $runtime . \n\n";
        }
    }
}