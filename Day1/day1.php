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
        $i = 0;
        $sum = 0;
        foreach ($f as $v) {
            if ($v !== "\n") {
                $sum += $v;
            }else{
                $e[$i] = $sum;
                $sum = 0;
                $i++;
            }
        }
        $top3[0] = max($e);
        $e[array_search($top3[0], $e)] = 0;
        $top3[1] = max($e);
        $e[array_search($top3[1], $e)] = 0;
        $top = $top3[0] + $top3[1] + max($e);
        $x++;
    }
    $runtime = (microtime(true) - $t) / $run;
    echo "Most calories: $top3[0] \nTop 3 total:  $top \n$run run average per run : $runtime . \n\n";
}
