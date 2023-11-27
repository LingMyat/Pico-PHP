<?php

namespace Core;

class Validator
{
    public static function validateString($val, $min = 1, $max = INF): bool
    {
        $valueLength = strlen(trim($val));

        return $valueLength >= $min && $valueLength <= $max;
    }

    public static function email($val)
    {
        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
}