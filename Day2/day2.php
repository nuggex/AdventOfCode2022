<?php

$time = microtime(true);
$f = file("i.txt");

$p1 = array("A" => "Rock", "B" => "Paper", "C" => "Scissors");
$p2 = array("X" => "Rock", "Y" => "Paper", "Z" => "Scissors");
$values = array("Rock" => 1, "Paper" => 2, "Scissors" => 3);
$score = array(0 => 3, -1 => 6, 2 => 6, 1 => 0, -2 => 0);
$loses = array("Rock" => "Scissors", "Paper" => "Rock", "Scissors" => "Paper");
$wins = array("Rock" => "Paper", "Scissors" => "Rock" , "Paper" => "Scissors");
$draw = array("Rock" => "Rock", "Scissors" => "Scissors" , "Paper" => "Paper");
$condition = array("X" => $loses, "Y" => $draw, "Z" => $wins);
$results = array();
$playerScore = 0;
$scoresPart2 = 0;
foreach($f as $e){
    $t = explode(" ", $e, 2);
    $t[1] = rtrim($t[1]);
    $result = $values[$p1[$t[0]]] - $values[$p2[$t[1]]];
    $playerScore += $score[$result] + $values[$p2[$t[1]]];

    $move = $condition[$t[1]];
    $p1Select = $p1[$t[0]];
    $player1 = $values[$p1Select];
    $player2 = $values[$move[$p1Select]];
    $result2 = $player1 - $player2;
    $scoresPart2 += $score[$result2] + $values[$move[$p1Select]];
}
$runtime = (microtime(true) - $time);
var_dump($playerScore);
var_dump($scoresPart2);

print_r("Run took: " . $runtime . " Seconds\n");