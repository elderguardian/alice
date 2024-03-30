<?php

class FileMetadataFactory implements IFileMetadataFactory {

    /**
     * @throws Exception
     */
    public function create(string $json): FileMetadata
    {
        $decoded = json_decode($json, true);

        if ($decoded === null) {
            throw new Exception('Failed to decode metadata JSON.');
        }

        return new FileMetadata($decoded['path'], $decoded['hashedPassword'], $decoded['originalName']);
    }
}