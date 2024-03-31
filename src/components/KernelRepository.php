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
                IRequest::class => new Request(),
                IFileManager::class => new JsonFileManager(),
                IFileMetadataFactory::class => new FileMetadataFactory(),
            ]);
        }

        return self::$kernel;
    }
}