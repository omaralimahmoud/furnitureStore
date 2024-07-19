<?php
class Request
{
    public function get(string $key): string
    {
        return $_GET[$key];
    }

    public function post(string $key): string
    {
        return $_POST[$key];
    }
    public function postClean(string $key): string

    {
        return trim(htmlspecialchars($_POST[$key]));
    }

    public function getHas(string $key): bool
    {
        return isset($_GET[$key]);
    }

    public function postHas(string $key): bool
    {
        return isset($_POST[$key]);
    }
}