<?php
$n = 1;
$h = 5;
$g = $n - 1;
$h = 0;
for ($i=0; $i<$n; $i++)
{
    for ($x=1; $x<$h; $i++)
    {
        echo str_repeat('.', $g) . '/' . str_repeat('.',$h) . '\' . str_repeat('.', $g) . PHP_EOL;
        $g -= 1;
        $h += 2;
    }
};
