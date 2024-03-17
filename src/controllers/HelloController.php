<?php

class HelloController extends Controller
{

    public function world(): string
    {
        return $this->respond('Hello, world!');
    }

}