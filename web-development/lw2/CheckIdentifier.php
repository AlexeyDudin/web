<?php
$request = $_GET['identifier'];
echo $request;
echo checkOnParam($request);


function checkOnParam($val)
{
    for ($i = 0; $i < strlen($val); $i++)
    {
        if ($i == 0)
        {
            if (!ctype_alpha($val[$i]))
                return 'false';
        }
        if (!ctype_alpha($val[$i]) && !is_numeric($val[$i]))
        {
            return 'false';
        }
    }
    return 'true';
}