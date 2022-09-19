<?php
$x = $_GET['x'];
$y = $_GET['y'];
$r = $_GET['r'];
$hit = 'Нет попадания.';

if (!(is_numeric($x) && $x >= -4 && $x <= 4 && 
    is_numeric($y) && $y >= -5 && $y <= 3 && 
    is_numeric($r) && $r >= 1 && $r <= 3)) {
    echo "Некорректные значения.";
    return;
}

if($x >= -$r/2 && $x <= 0 && $y >= -$r/2 && $y <= 0 || 
    $x <= $r && $x >= 0 && $y <= $r && $y >= 0 || 
    ($x - $y <= $r) && $x >= 0 && $y <= 0) {
    $hit = 'Попадание.';
    echo 'Есть попадание!';
} else {
    echo 'Нет попадания :(';
}
$time = time();
$time_end = microtime(true);
$time_diff = $time_end - $_SERVER["REQUEST_TIME_FLOAT"];
setcookie("hit$time", "<tr>
<td>$x</td>
<td>$y</td>
<td>$r</td>
<td>$hit</td>
<td>$time_diff</td>
</tr>", time() + 600);
?>