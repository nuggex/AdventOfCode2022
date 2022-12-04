<?php


class Day4
{
    private array|false $f;
    public function __construct()
    {
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
    }


    public function part1()
    {
        $k = [];
        $result = 0;
        foreach ($this->f as $e) {
            $t = explode(",", $e);
            foreach ($t as $g => $s) {
                $k[] = explode("-", $s);
                if ($g == 1) {
                    $first = range($k[0][0], $k[0][1]);
                    $second = range($k[1][0], $k[1][1]);
                    $testFirst = !array_diff($first, $second);
                    $testSecond = !array_diff($second, $first);
                    if ($testFirst || $testSecond) $result++;
                    $k = [];
                }
            }
        }
        return $result;
    }

    public function part2()
    {
        $k = [];
        $result = 0;
        foreach ($this->f as $e) {
            $t = explode(",", $e);
            foreach ($t as $g => $s) {
                $k[] = explode("-", $s);
                if ($g == 1) {
                    $first = range($k[0][0], $k[0][1]);
                    $second = range($k[1][0], $k[1][1]);
                    $intersect = !array_intersect($first, $second);
                    if (!$intersect) $result++;
                    $k = [];
                }
            }
        }
        return $result;
    }
}