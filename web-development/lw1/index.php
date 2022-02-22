<?php

$result = $_GET['text'];
$result = removeExtraBlanks($result);
echo $result;

function removeExtraBlanks($val) {
    return str_replace('  ', ' ', $val);
}