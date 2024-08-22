<?php

namespace furnitureStore\Classes;

class Request
{
    public function get(string $key): string
    {
        return $_GET[$key];
    }

    public function post(string $key):string
    {
        return $_POST[$key];
    }
    public function files(string $key): array
    {
        return $_FILES[$key]  ?? [];
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
    public function redirect($path)
    {
        header("location:" . URL . $path);
    }
    public function AdminRedirect($path)
    {
        header("location:" . AdminURL . $path);
    }
}