<?php

class Validator
{
    public function string($val, $min = 1, $max = INF)
    {
        $value = trim($val);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
}