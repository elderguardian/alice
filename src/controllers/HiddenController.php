<?php

class HiddenController extends Controller
{

    public function index(): string
    {
        return $this->respond('This site is protected by middleware!');
    }

}