<?php

interface ValidationRule
{
    public function check(string $name, $value);
}