<?php

function dd($value)
{
    var_dump($value);

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
