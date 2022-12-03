<?php
/**
 * Advent of Code multi run benchmarking
 * Benchmarked on Ryzen Threadripper 2950X
 * 10k runs average 90us / run
 * PHP 8.1.12
 */
$x = 0;
$runs = array(1,10000,100000);
foreach ($runs as $run) {
    $t = microtime(true);
    $f = file("i.txt");
    while ($x < $run) {
        $top3 = [];
        $top = 0;
        $e = [];
        $sum = 0;
        foreach ($f as $v) {
            if (($v != "\r\n")) {
                $sum += $v;
                continue;
            }

            $e[] = $sum;
            $sum = 0;

        }
        $top1 = array_splice($e, max($e));
        $top2 = array_splice($e, max($e));
        $top = $top1 + $top2 + max($e);
        $x++;
    }
    $runtime = (microtime(true) - $t) / $run;
    echo "Most calories: $top1 \nTop 3 total:  $top \n$run run average per run : $runtime . \n\n";
}
