<?php
namespace timedoctor;

class FileSource extends Source
{
    /**
     * @var string
     */
    protected $filepath;

    public function __construct(string $filepath)
    {
        if (!file_exists($filepath)) {
            $this->createFile($filepath);
        }
        $this->filepath = $filepath;
    }

    public function getData(): string
    {
        $result = file_get_contents($this->filepath);

        if ($result === false) {
            // TODO: Create Logger
            throw new \ErrorException('Error reading data from file: ' . $this->filepath);
        }
        return $result;
    }

    public function putData(string $data): void
    {
        $result = file_put_contents($this->filepath, $data);
        if ($result === false) {
            // TODO: Create Logger
            throw new \ErrorException('Error writing data to file: ' . $this->filepath);
        }
    }

    private function createFile(string $filepath): void
    {
        $dirname = dirname($filepath);
        if (!is_dir($dirname)) {
            $this->createDirectory($dirname);
        }
        $result = fopen($filepath, 'w');
        if ($result === false) {
            // TODO: Create Logger
            throw new \ErrorException('Error creating file: ' . $filepath);
        }
    }

    private function createDirectory(string $dirname): void
    {
        $result = mkdir($dirname);
        if ($result === false) {
            // TODO: Create Logger
            throw new \ErrorException('Error creating directory: ' . $dirname);
        }
    }
}