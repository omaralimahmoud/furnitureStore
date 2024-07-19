<?php

class Str implements ValidationRule
{
    
public function check(string $name, $value)
{
    if (! is_string($value)) {
        return  " $name  must be string";
    }
    return false;
}
    
}