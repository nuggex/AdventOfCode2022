<?php

class Day3
{
    private array|false $f;
    function __construct()
    {
        $this->f = file(dirname(__FILE__) . "/i.txt", FILE_IGNORE_NEW_LINES);
    }
    public function part1(){
        $temp = 0;
        foreach($this->f as $e){
            $t = str_split($e, floor(strlen($e)/2));
            $s = array_values(array_unique(array_intersect(str_split($t[0]), str_split($t[1]))));
            if(ctype_upper($s[0])){
                $temp += ord($s[0]) - 38;
            }else{
                $temp += ord($s[0]) - 96;
            }
        }
        return $temp;
    }

    public function part2(){
        $counter = 0;
        $temp = 0;
        $t = array();
        foreach($this->f as $e){
            $counter++;
            $t[] = str_split($e);
            if($counter == 3){
                $s = array_values(array_unique(array_intersect($t[0], $t[1], $t[2])));
                if(ctype_upper($s[0])){
                    $temp += ord($s[0]) - 38;
                }else{
                    $temp += ord($s[0]) - 96;
                }
                $t = [];
                $counter = 0;
            }
        }
        return $temp;
    }
}