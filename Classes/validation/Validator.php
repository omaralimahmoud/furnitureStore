<?php

namespace furnitureStore\Classes\Validation;

class Validator
{
    private $errors = [];

    public function validate(string $name, $value, array $rules)
    {

        foreach ($rules as $rule) {
            $ClassName = "furnitureStore\\Classes\\Validation\\" . $rule;
            $object = new $ClassName;

            $error = $object->check($name, $value);
            if ($error !== false) {
                array_push($this->errors, $error);  // Correctly using array_push
                break;
            }
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}