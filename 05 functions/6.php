<?php
$elements= [1, 2, 3, 4.5, "15"];
function doubleNr($elements)
{
    for ($i = 0; $i < count($elements); $i++)
    {
      echo (int)$elements[$i] * 2 . "\n";
    }
}
echo doubleNr($elements);
