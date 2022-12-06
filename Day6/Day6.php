<?php

class Day6
{

    private array|false $file;
    private string $filename;
    private array $result;

    public function __construct()
    {
        $this->filename = dirname(__FILE__) . "/i.txt";
        $this->file = file($this->filename, FILE_IGNORE_NEW_LINES);
        $this->result = array_values(str_split($this->file[0]));

    }

    public function Part1()
    {
        $checkArray = [];
        foreach ($this->result as $key => $un) {
            if ($key > 3) {
                $test = array_slice($checkArray, $key - 4, 4);
                if (array_unique($test) === $test) {
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
                $test = array_slice($checkArray, $key - 14, 14);
                if (array_unique($test) === $test) {
                    return "\nCheck key: " . $key;
                }
            }
            $checkArray[] = $un;
        }
    }
}