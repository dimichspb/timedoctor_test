<?php
namespace timedoctor;


abstract class Output implements OutputInterface
{
    protected $source;

    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    public function write(string $data): void
    {
        $this->source->putData($data);
    }
}