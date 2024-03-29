<?php

interface IFileManager
{
    function setMetadata(string $name, FileMetadata $metadata): void;

    function getMetadata(string $name): FileMetadata;
}