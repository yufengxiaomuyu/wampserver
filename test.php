<?php
function test($a,$b = 8){
    $add = $a + $b;
    return $add;
    echo $add + 2;
}

echo test(2,5);