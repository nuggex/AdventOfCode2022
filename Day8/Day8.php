<?php

class Day8
{

    private string $filename;
    private array|false $file;
    private array $matrix;

    public function __construct()
    {
        $this->filename = dirname(__FILE__) . "/i.txt";
        $this->file = file($this->filename, FILE_IGNORE_NEW_LINES);
    }

    public function LoadData()
    {
        foreach ($this->file as $row) {
            $explode = str_split($row);
            $this->matrix[] = $explode;
        }
    }


    public function Part1()
    {
        $this->LoadData();
        $trees = 0;
        $trees += (count($this->matrix) * 2) + ((count($this->matrix[0]) - 2) * 2);
        $counter = 0;
        $counted = [];
        foreach ($this->matrix as $key => $row) {
            if ($key > 0 && $key < (count($this->matrix) - 1)) {
                foreach ($row as $k => $r) {
                    /* while ($counter <= count($this->matrix)) {
                         $count = true;
                         $keyC = $key + $counter;
                         $kC = $k + $counter;
                         $keyM = $key - $counter;
                         $kM = $k - $counter;
                         if (($keyM > 0) &&
                             ($kM > 0) &&
                             ($keyC <= (count($this->matrix))) &&
                             ($kC <= (count($row)))) {
                             if (
                                 $r < $this->matrix[$keyM][$kM] ||
                                 $r < $this->matrix[$keyC][$kC] ||
                                 $r < $this->matrix[$keyM][$kC] ||
                                 $r < $this->matrix[$keyC][$kM]) {
                                 echo $k . " - " . $r . "\n";
                                 $count = false;
                             }
                         }
                         $counter++;
                     }*/
                    /*
                    $counter = 1;
                    while ($counter <= count($row)) {
                        $count = true;
                        $keyYP = $key + $counter;
                        $kXP = $k + $counter;
                        $keyXM = $key - $counter;
                        $kXM = $k - $counter;
                        if (($keyXM <= (count($this->matrix))) &&
                            ($kXM <= (count($row)))) {
                            if (
                                $r < $this->matrix[$keyXM][$kXM]){
                                echo $k . " - " . $r . "\n";
                                $count = false;
                            }
                        }
                        $counter++;
                    }*/

                    foreach ($this->matrix as $kr => $rr) {
                        $count = true;
                        print_r("key: " . $key . " k:" . $k . " kr:" . $kr . "\n");
                        if ($k > 0 && $k < count($rr)-1 && $kr > 0 && $kr < count($row)-1) {
                            $keykr = "X" . $key . "-" . $kr;
                            $krkey = "Y" . $kr . "-" . $key;
                            if (in_array($keykr, $counted) || in_array($krkey, $counted)) {
                                $count = false;
                            }
                            if ($r < $this->matrix[$kr][$k]) {
                                $count = false;
                                $counted[] = $krkey;
                            }
                            if($r < $this->matrix[$k][$kr]){
                                $counted[] = $keykr;
                                $count = false;
                            }
                        }
                    }

                    if (isset($count) && $count) {
                        $trees++;
                    }
                }
            }

        }
        var_dump($trees);
    }
}