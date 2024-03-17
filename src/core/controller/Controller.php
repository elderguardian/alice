<?php

abstract class Controller implements IController
{

    public function respond($data): string
    {
        return strval($data);
    }

}