<?php

class FileMetadata
{
    private string $path;
    private string|null $hashedPassword;
    private string $originalName;

    public function __construct(string $path, string|null $hashedPassword, string $originalName)
    {
        $this->path = $path;
        $this->hashedPassword = $hashedPassword;
        $this->originalName = $originalName;
    }

    public function __toString(): string
    {
        return json_encode([
            'path' => $this->path,
            'hashedPassword' => $this->hashedPassword,
            'originalName' => $this->originalName
        ]);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }
}