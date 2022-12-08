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
        $counter = 1;
        $counted = [];
        foreach ($this->matrix as $key => $row) {
            if ($key > 0 && $key < (count($this->matrix) - 1)) {
                $count = false;

                foreach ($row as $k => $r) {
                    if ( $k < (count($row)) - 1) {
                        while ($counter < count($this->matrix) - 1) {
                            $count = true;
                            $keyC = $key + $counter;
                            $kC = $k + $counter;
                            $keyM = $key - $counter;
                            $kM = $k - $counter;
                            if (($keyM > 0) &&
                                ($kM > 0) &&
                                ($keyC < (count($this->matrix))) &&
                                ($kC < (count($row)))) {
                                if (
                                    $r < $this->matrix[$keyM][$kM] ||
                                        $r < $this->matrix[$keyC][$kC] ||
                                        $r < $this->matrix[$keyM][$kC] ||
                                        $r < $this->matrix[$keyC][$kM] ) {
                                    $count = false;
                                }
                            }
                            $counter++;
                        }
                        $counter = 1;
                    }
                    if ($count) {
                        $trees++;
                    }
                }
            }
        }
        var_dump($trees);
    }
}