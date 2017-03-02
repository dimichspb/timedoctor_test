<?php
namespace timedoctor;

class Processor
{
    /**
     * @var string
     */
    private $data;

    public function load(string $data): void
    {
        $this->data = $data;
    }

    public function process(): string
    {
        $result = '';
        // TODO: process data
        $result = $this->data;

        return $result;
    }
}