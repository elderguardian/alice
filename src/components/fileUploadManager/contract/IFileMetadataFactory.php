<?php

interface IFileMetadataFactory
{
    public function create(string $json): FileMetadata;
}