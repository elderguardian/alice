<?php
class JsonFileManager implements IFileManager
{
    private string $uploadDir = '/alice/metadata/';

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!file_exists($this->uploadDir) && !mkdir($this->uploadDir, 0777, true)) {
            throw new Exception('Failed to create upload directory.');
        }
    }

    /**
     * @throws Exception
     */
    public function setMetadata(string $name, FileMetadata $metadata): void
    {
        $asString = $metadata->__toString();
        $filepath = $this->uploadDir . $name . '.json';

        if (file_put_contents($filepath, $asString) === false) {
            throw new Exception('Failed to write metadata to file.');
        }
    }

    /**
     * @throws Exception
     */
    public function getMetadata(string $name): FileMetadata
    {
        $filepath = $this->uploadDir . $name . '.json';
        if (!file_exists($filepath)) {
            throw new Exception('Metadata file not found.');
        }

        $json = file_get_contents($filepath);
        if ($json === false) {
            throw new Exception('Failed to read metadata file.');
        }

        $kernel = KernelRepository::get();
        $fileMetadataFactory = $kernel->get(IFileMetadataFactory::class);
        return $fileMetadataFactory->create($json);
    }
}