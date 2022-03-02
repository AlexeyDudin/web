<?php
$email = $_GET['email'];
$passwd = $_GET['passwd'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$age = $_GET['age'];
$file_name = "data/" . $email . ".txt";

if (!file_exists($file_name))
{
    file_put_contents($file_name, "First Name:" . $first_name . "\n" . "Last Name:" . $last_name . "\n" . "Password:" . $passwd . "\n" . "Age:" . $age );
}
else
{
    $str=file_get_contents($file_name);
    $str_arrays = preg_split("/\r\n|\n|\r/", $str);

    for ($i = 0; $i< count($str_arrays); $i++)
    {
        $fields = $str_arrays[$i];
        $fields_name = preg_split("/:/", $fields);
        if (($passwd != "") && ("Password" == $fields_name[0]))
            $str_arrays[$i] = "Password:" . $passwd;
        if (($first_name != "") && ("First Name" == $fields_name[0]))
            $str_arrays[$i] = "First Name:" . $first_name;
        if (($last_name != "") && ("Last Name" == $fields_name[0]))
            $str_arrays[$i] = "Last Name:" . $last_name;
        if (($age != "") && ("Age" == $fields_name[0]))
            $str_arrays[$i] = "Age:" . $age;
    }

    $result_str = "";
    for ($i = 0; $i < count($str_arrays); $i++)
    {
        $result_str .= $str_arrays[$i] . "\n";
    }

    $result_str = substr($result_str, 0, strlen($result_str) - 1);

    file_put_contents($file_name, $result_str);
}

