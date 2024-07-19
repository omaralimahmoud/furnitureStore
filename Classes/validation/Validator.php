<?php
class Validator
{
    private $errors = [];

    public function validate(string $name, $value, array $rules)
    {
        foreach ($rules as $rule) {
            $object = new $rule;

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