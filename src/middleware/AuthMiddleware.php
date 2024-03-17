<?php

class AuthMiddleware extends Controller implements IMiddleware
{

    public function canPass(): bool
    {
        $hasToken = isset($_GET['token']);
        if (!$hasToken) return false;
        return $_GET['token'] == 'secret_key';
    }

    function onFail(): string
    {
        return $this->respond("You are missing a valid token parameter!");
    }
}