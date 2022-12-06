<?php

class Day5
{


    private string $filename;
    private array|false $file;
    private array|false $moves;
    private array|false $cols;

    public function __construct()
    {
        $this->filename = dirname(__FILE__) . "/i.txt";
        $this->file = file($this->filename, FILE_IGNORE_NEW_LINES);
    }

    public function Part1(): string
    {
        $this->loadData();
        foreach ($this->moves as $move) {
            for ($i = 0; $i < $move[1]; $i++) {
                array_splice($this->cols[$move[5] - 1], 0, 0, array_shift($this->cols[$move[3] - 1]));
            }
        }
        $answer = "";
        for ($i = 0; $i < count($this->cols); $i++) {
            $answer .= $this->cols[$i][0];
        }
        return $answer;
    }

    public function Part2(): string
    {
        $this->loadData();
        foreach ($this->moves as $move) {
            $temp = [];
            for ($i = 0; $i < $move[1]; $i++) {
                $temp[] = array_shift($this->cols[$move[3] - 1]);
            }
            array_splice($this->cols[$move[5] - 1], 0, 0, $temp);
        }
        $answer = "";
        for ($i = 0; $i < count($this->cols); $i++) {
            $answer .= $this->cols[$i][0];
        }
        return $answer;
    }

    private function loadData()
    {
        $isMove = false;
        $this->cols = [];
        $this->moves = [];
        foreach ($this->file as $row) {
            if (!$isMove && $row[1] == "1") {
                $isMove = true;
                continue;
            }
            if (!$isMove) {
                $rowC = str_split($row, 4);
                foreach ($rowC as $key => $r) {
                    if ($r !== "    ") $this->cols[$key][] = $r;
                }
            }
            if ($isMove && !empty($row)) {
                $this->moves[] = explode(" ", $row);
            }
        }
    }
}
