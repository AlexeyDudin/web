<?php
$passwd = $_GET["password"];
echo my_password_strenght($passwd);

function my_password_strenght($passwd)
{
    $passwdStrenght = (4 * strlen($passwd));

    $passwdStrenght += (4 * count_digits($passwd));
    if (count_upper_chars($passwd) != 0)
    {
        $passwdStrenght += ((strlen($passwd) - count_upper_chars($passwd)) * 2);
    }
    if (count_lower_chars($passwd) != 0)
    {
        $passwdStrenght += ((strlen($passwd) - count_lower_chars($passwd)) * 2);
    }
    if (is_only_chars($passwd))
    {
        $passwdStrenght -= strlen($passwd);
    }
    if (is_only_digits($passwd))
        $passwdStrenght -= strlen($passwd);

    //TODO Проверка на повтор символов и вычет
    $unique_array = array_unique(str_split($passwd));
    for ($i = 0; $i < count($unique_array); $i++)
    {
        if (get_count_char_from($passwd, $unique_array[$i]) != 1) {
            $passwdStrenght -= get_count_char_from($passwd, $unique_array[$i]);
        }
    }
    return $passwdStrenght;
}

function count_digits($val)
{
    $result = 0;
    for ($i =0; $i < strlen($val); $i++)
    {
        if (is_numeric($val[$i]))
            $result++;
    }
    return $result;
}

function count_upper_chars($val)
{
    $result = 0;
    for ($i = 0; $i < strlen($val); $i++) {
        if (ctype_upper($val[$i]))
            $result++;
    }
    return $result;
}

function count_lower_chars($val)
{
    $result = 0;
    for ($i = 0; $i < strlen($val); $i++) {
        if (ctype_lower($val[$i]))
            $result++;
    }
    return $result;
}

function is_only_chars($val)
{
    $result = true;
    for ($i = 0; $i < strlen($val); $i++) {
        if (is_numeric($val[$i])) {
            $result = false;
            break;
        }
    }
    return $result;
}

function is_only_digits($val)
{
    $result = true;
    for ($i = 0; $i < strlen($val); $i++) {
        if (ctype_alpha($val[$i])) {
            $result = false;
            break;
        }
    }
    return $result;
}

function get_count_char_from($val, $ch)
{
    $result = 0;
    for ($i = 0; $i < strlen($val); $i++)
    {
        if ($val[$i] == $ch)
            $result++;
    }
    return $result;
}