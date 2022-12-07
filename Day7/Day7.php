<?php

class Day7
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

    public function LoadData()
    {
        $root = false;
        $data = [];
        $lastCommand = "";
        $insert = array();
        $previousFolder = "/";
        $currentFolder = "";
        $insertCommand = false;
        foreach ($this->file as $key => $line) {
            $newCommand = false;

            $explode = explode(" ", $line);
            if ($explode[0] == "$") {
                $lastCommand = $explode[1];
                if ($lastCommand == "cd") {
                    if ($explode[2] == "/") {
                        $currentFolder = "/";
                        $previousFolder = false;
                    } elseif ($explode[2] == "..") {
                        $currentFolder = $previousFolder;
                    } else {
                        $previousFolder = $currentFolder;
                        $currentFolder = $explode[2];
                    }
                }
                $newCommand = true;
            }

            if (!$newCommand) {
                if ($lastCommand == "ls") {
                    if ($explode[0] == "dir") {
                        if ($previousFolder && $previousFolder != $currentFolder) {
                            $insert[$previousFolder][$currentFolder][$explode[1]] = "dir";
                        } else {
                            $insert[$currentFolder][$explode[1]] = "dir";
                        }
                    }
                    if (is_numeric($explode[0])) {
                        if ($previousFolder && $previousFolder != $currentFolder) {
                            $insert[$previousFolder][$currentFolder][$explode[1]] = array("dir" => $currentFolder, "size" => $explode[0], "parent" => $previousFolder);
                        } else {
                            $insert[$currentFolder][$explode[1]] = array("dir" => $currentFolder, "size" => $explode[0]);
                        }
                    }
                }
            }
            if ($key !== 0 && !empty($insert)) {
                if(!isset($insert["/"])) $insert = array("/" => $insert);
                $data = array_merge_recursive($data, $insert);
                $insert = array();
            }
        }
        return $data;
    }

    public function Part1(){
        $data = $this->LoadData();

        $keys = array_keys($data);
        $sums = [];
        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($data));
        $keys = [];
        foreach($iterator as $key=>$value){
            if(strlen($value) === 1) $keys[] = $value;
        }

        $keys = array_unique($keys);

        $iter = new ArrayIterator($data);
        foreach($iter as $value){
            var_dump($value);
            /*foreach($data as $key=>$value){
                var_dump($value);
            }*/
        }

        var_dump($sums);


    }

}