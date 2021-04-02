// Reverse String:
<?php 
    function reverseString(string $s): string{
        $words = explode(' ',$s);
        
        for ($i = 0; $i < count($words); $i++){
            $words[$i] = strrev($words[$i]);
        }
        return implode(' ',$words);
    }
    echo "Reverse String Result: ",reverseString("emocleW ot PHP"),"\n";
?>

// filter array by even number
<?php 
    $arr = [2, 3, 4, 6, 7, 9, 11, 20];
    $filter = fn($arr) => array_filter($arr, fn($val) => ($val % 2));
    print_r($filter($arr));
?>

// sum all provided values
<?php 
    $sum = fn($arg) => array_sum(func_get_args());
    echo "Total:",$sum(2, 3),"\n";
    echo "Total:",$sum(2, 3, 4),"\n";
    echo "Total:",$sum(2, 3, 4, 5),"\n";
?>