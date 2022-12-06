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
        $columns = [];
        var_dump($values);
        for($i = 1; $i <=$max;$i++){
            if(isset($values[1][$i+1])){
                $columns[1][$i] = $values[1][$i+1];
            }
            if(isset($values[2][$i+1])){
                $columns[2][$i] = $values[2][$i+1];
            }
            if(isset($values[3][$i+1])){
                $columns[3][$i] = $values[3][$i+1];
            }
        }
        var_dump($columns);
        foreach($moves as $move){
            for($i = 0; $i <$move[1];$i++){
                exit;
                //$offset = max($values[$values[$move[3]]);
               // var_dump($offset);
                //$movable = array_splice($values[$move[3]], max($values[$move[3]]),1);
                //var_dump($movable);
                //$values[$move[5]][] = $movable;
            }
        }
        //var_dump($values);

    }
}