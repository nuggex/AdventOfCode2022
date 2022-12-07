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
        $files = [];
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
                            $files[$previousFolder . $currentFolder . "-" . $explode[1]] = $explode[0];
                            $insert[$previousFolder][$currentFolder][$explode[1]] = array("dir" => $currentFolder, "size" => $explode[0], "parent" => $previousFolder);
                        } else {
                            $insert[$currentFolder][$explode[1]] = array("dir" => $currentFolder, "size" => $explode[0]);
                            $files[$currentFolder . "-" . $explode[1]] = $explode[0];
                        }
                    }
                }
            }
            if ($key !== 0 && !empty($insert)) {
                if (!isset($insert["/"])) $insert = array("/" => $insert);
                $data = array_merge_recursive($data, $insert);
                $insert = array();
            }
        }
        return array($data, $files);
    }

    public function Part1()
    {
        $load = $this->LoadData();
        $test = $load[0];
        $data = $load[1];
        $folderKeys = [];
        $foldervalues = [];
        foreach ($data as $key => $values) {
            $folder = explode("-", $key);
            if (str_contains($folder[0], "/")) {
                $folderKeys[$key] = $values;
                $foldervalues[] = explode("-",$key)[0];
            } else {
                $folderKeys["/" . $key] = $values;
                $foldervalues[] = "/" . explode("-",$key)[0];
            }
        }
        $folderSums = [];
        foreach ($folderKeys as $key => $value) {
            if ((int)$value <= 100000) {
                $folderSums[$key] = $value;
            }
        }
        var_dump($folderSums);
    }

}