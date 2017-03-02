<?php

namespace timedoctor;

class App
{
    /**
     * @var array
     */
    private $config = [];
    /**
     * @var string
     */
    private $storage;

    public function __construct(array $config)
    {
        if (!isset($config['storage'])) {
            throw new \InvalidArgumentException('Configuration key \'storage\' must be set');
        }
        if (!isset($config['input-filename'])) {
            throw new \InvalidArgumentException('Configuration key \'input-filename\' much be set');
        }
        $this->config = $config;
    }

    public function run()
    {
        // TODO: Create Logger

        $inputSource = new FileSource($this->buildInputFilePath());
        $input = new FileInput($inputSource);
        $data = $input->read();

        $outputSource = new ConsoleSource();
        $output = new ConsoleOutput($outputSource);
        $output->write($data);
    }

    private function buildInputFilePath()
    {
        return
            dirname(__DIR__)            . DIRECTORY_SEPARATOR .
            $this->config['storage']    . DIRECTORY_SEPARATOR .
            $this->config['input-filename'];
    }
}