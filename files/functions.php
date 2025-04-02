<?php

function readArrayFromFile($filename)
{
    $file = file_get_contents($filename);

    $arr = array_map("intval", explode(", ", $file));
    $arr = array_values(array_filter($arr, fn($e) => $e % 5 === 0));

    echo array_reduce($arr, function ($carry, $item) {
        return $carry * $item;
    }, 1);

    echo "<br>";
    echo "-------------------------------------------------------";
    echo "<br>";

    for ($i = 0; $i < count($arr); $i++) {
        if ($i === 0) {
            if ($arr[$i] > $arr[$i + 1]) {
                echo $arr[$i];
                echo "<br>";
            }
            continue;
        }

        if ($i === count($arr) - 1) {
            if ($arr[$i] > $arr[$i - 1]) {
                echo $arr[$i];
                echo "<br>";
            }
            continue;
        }

        if ($arr[$i] > $arr[$i - 1] && $arr[$i] > $arr[$i + 1]) {
            echo $arr[$i];
            echo "<br>";
        }
    }
}
