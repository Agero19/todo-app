<?php

/**
 * Summary of dump_die
 * @param mixed $variable
 * @return never
 */
function dump_die($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    die();
}

/**
 * Summary of urlIs
 * @param mixed $value
 * @return bool
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function email($value)
{
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}