<?php


class SB
{

    static function d($item)
    {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }


    static function dd($item)
    {
        SB::d($item);
        die;
    }

}