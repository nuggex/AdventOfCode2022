<?php

class Day6
{

    private $f;
    private $filename;
    private array|false $file;
    private int $cond;
    private $result;
    public function __construct()
    {
        $this->filename = dirname(__FILE__) . "/i.txt";
        $this->f = fopen($this->filename, "r");
        $this->file = file($this->filename, FILE_IGNORE_NEW_LINES);
        $this->cond = 14;
        $this->result = array_values(str_split($this->file[0]));

    }

    public function Part1()
    {
        $checkArray = [];
        foreach ($this->result as $key => $un) {
            if ($key > 3) {
                $test = array_slice($checkArray, $key-4,4);
                if(count(array_unique($test)) === count($test)){
                    return "\nCheck key: " . $key;
                }
            }
            $checkArray[] = $un;
        }
    }

    public function Part2()
    {
        $checkArray = [];
        foreach ($this->result as $key => $un) {
            if ($key > 13) {
                $test = array_slice($checkArray, $key-14,14);
                if(count(array_unique($test)) === count($test)){
                    return "\nCheck key: " . $key;
                }
            }
            $checkArray[] = $un;
        }
    }
}