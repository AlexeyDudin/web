<?php
$email= $_GET['email'];
$file_name = "data/" . $email . ".txt";

$str=file_get_contents($file_name);
$str_arrays = preg_split("/\r\n|\n|\r/", $str);

for ($i = 0; $i< count($str_arrays); $i++)
{
    $fields = $str_arrays[$i];
    $fields_name = preg_split("/:/", $fields);
    if ($fields_name[1] != "")
        echo $fields_name[0] . ":" . $fields_name[1] . "<br>";
}