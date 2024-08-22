<?php

namespace furnitureStore\Classes\Validation;

interface ValidationRule
{
    public function check(string $name, $value);
}