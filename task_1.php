<?php
$a = 3;
$array = [22, 45, 22, 34, 234, 234, 657, 2, 22, 0, 2];

$len = count($arr);
for ($i = 0; $i < $len; $i++){
    if (strrpos($array[$i], "2") !== false) {
        $len++;
        for ($j = $len - 1; $j > $i; $j--){
            $array[$j] = $array[$j-1];
        }        
        $i++;
        $array[$i] = $a;
    }
}

print_r($array);
?>