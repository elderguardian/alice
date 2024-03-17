<?php

class KernelRepository
{
    static ?IKernel $kernel = null;

    /**
     * @return IKernel
     */
    public static function get(): IKernel
    {
        if (!self::$kernel) {
            self::$kernel = new Kernel([

            ]);
        }

        return self::$kernel;
    }
}