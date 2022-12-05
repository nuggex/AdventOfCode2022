<?php

class Day5
{


    private $f;
    private $filename;
    private array|false $file;

    public function __construct()
    {
        $this->filename = dirname(__FILE__) . "/i.txt";
        $this->f = fopen($this->filename, "r");
        $this->file = file($this->filename, FILE_IGNORE_NEW_LINES);

    }

    public function Part1()
    {
        $input = [];
        $moves = [];
        $max = 0;
        $cols = [];
        $isMove = false;
        foreach ($this->file as $row) {
            if ($row[1] == "1") {
                $max = max(explode(" ", $row));
                $cols = explode(" ", $row);
                $isMove = true;
                continue;
            }

            if ($isMove && !empty($row)) {
                $moves[] = explode(" ", $row);
            } elseif (!empty($row)) {
                $input[] = $row;
            }

        }
        $cols = array_values(array_unique(array_filter($cols)));
        $values = [];
        $input = array_reverse($input);
        foreach ($cols as $col) {

            if (str_contains($input[$col - 1], "   ")) {
                $temp = explode("   ", $input[$col - 1], $max);
            } else {
                $temp = explode(" ", $input[$col - 1], $max);
            }
            $values[$col] = $temp;
        }
        var_dump($values);
        var_dump($moves);
        foreach($moves as $move){
            for($i = 0; $i <$move[1];$i++){
            }
        }
        var_dump($values);

    }
}