<?php

class Autoloader
{
    public function register()
    {
        spl_autoload_register(function ($class) {
            self::autoload($class);
        });
    }

    private function autoload($class)
    {
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("."));

        foreach ($rii as $file) {
            if ($file->getFilename() == "$class.php") {
                require_once $file->getPathname();
                break;
            }
        }
    }
}