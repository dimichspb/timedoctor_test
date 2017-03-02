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
        if (!isset($config['output-filename'])) {
            throw new \InvalidArgumentException('Configuration key \'output-filename\' much be set');
        }
        $this->config = $config;
    }

    public function run(): void
    {
        // TODO: Create Logger

        $inputSource = new FileSource($this->buildInputFilePath());
        $input = new FileInput($inputSource);
        $data = $input->read();

        $result = $this->processData($data);

        $outputSource = new ConsoleSource();
        $output = new ConsoleOutput($outputSource);
        $output->write($result);
    }

    private function buildInputFilePath(): string
    {
        return
            dirname(__DIR__)            . DIRECTORY_SEPARATOR .
            $this->config['storage']    . DIRECTORY_SEPARATOR .
            $this->config['input-filename'];
    }

    private function buildOutputFilePath(): string
    {
        return
            dirname(__DIR__)            . DIRECTORY_SEPARATOR .
            $this->config['storage']    . DIRECTORY_SEPARATOR .
            $this->config['output-filename'];
    }

    private function processData(string $data): string
    {
        $result = '';
        $processor = new Processor();
        $processor->load($data);

        try {
            $result = $processor->process();
        } catch (\Exception $e) {
            // TODO: Create Logger
        }

        return $result;
    }
}