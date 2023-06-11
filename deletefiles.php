<?php

// this program will delete all of the css files from the current directory

foreach ($argv as $arg) {
    if ($arg[0] == ".") {
        $extension = $arg;
        echo $extension;
    }

    if (is_dir($arg)) {
        $from = $arg;
        echo $from;
    }


}
/*
foreach (glob("*".$extension) as $filename) {
unlink($filename);
}*/

deletefiles($from, $extension);
//var_dump($filesdeleted);
function deletefiles($from, $ext)
{

    $files = array();
    $dirs = array($from);
    while (NULL !== ($dir = array_pop($dirs))) {
        if (($dh = opendir($dir)) !== null) {
            while (($file = readdir($dh)) !== false) {
                echo "\ntest1 $from\n";
                if ($file == '.' || $file == '..') {
                    continue;
                }

                $path = $dir . '/' . $file;
                if (is_dir($path)) {
                    $dirs[] = $path;
                } else {
                    $files[] = $path;
                    echo "\ntest2\n";
                    $extension = substr($file, -(strlen($ext)), strlen($file));
                    echo "\n".$extension."\n";
                    if ($extension == $ext) {
                        echo "\ncheck\n";
                        unlink(str_replace(" ","\ ",$path));
                    }
                }


                
            }

            closedir($dh);

        }
    }

    return $files;
}